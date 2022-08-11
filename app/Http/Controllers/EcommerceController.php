<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SegurancaController;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class EcommerceController extends Controller
{

    public function dash()
    {
        $produtos = Produto::all();
        return view('ecommerce.index', compact('produtos'));
    }

    public function login()
    {
        return view('ecommerce.login');
    }

    public function cadastro()
    {
        return view('ecommerce.cadastro');
    }

    public function updatecliente(Request $req)
    {
        $dados = $req->all();

        if($dados['password'] != $dados['password1']){
            echo"<script language='javascript' type='text/javascript'>
            alert('A senha de confirmação está diferente, por favor, tente novamente.');window.location
            .href='/cadastro';</script>";
        }

        function createcliente(array $dados){

            $criar = Cliente::create([
                'nome' => $dados['nome'],
                'telefone' => $dados['telefone'],
                'email' => $dados['email'],
                'bairro' => $dados['bairro'],
                'rua' => $dados['rua'],
                'numCasa' => $dados['numCasa'],
                'password' => bcrypt($dados['password'])
            ]);

            return $criar;

        }

        createcliente($dados);
        echo"<script language='javascript' type='text/javascript'>
        alert('Você foi cadastrado com sucesso!');window.location
        .href='/login';</script>";
    }

    public function sair(Request $req){
        $req->session()->forget('logado');
        $req->session()->forget(["usuario"]);
        return redirect()->route('ecommerce.dash');
    }

    public function entrar(Request $req)
    {
        $dados = $req->all();
        $cliente = DB::table('clientes')
            ->select()
            ->where('email', '=', $dados['email'])
            ->first();
        if ($cliente)
        {

            $id = $cliente->id;
            $usuario = Cliente::find($id);

            if($usuario->verificado == 'N'){

                function gerarcode($id){
                    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    $max = strlen($caracteres) - 1;
                    $code = "";

                    for($i=0; $i < 10; $i++) {
                        $code .= $caracteres[mt_rand(0, $max)];
                    }

                    $cliente = Cliente::find($id);
                    $cliente->codverificacao = $code;
                    $email = $cliente->email;
                    $cliente->save();

                function enviaemail($code,$email){
                    $from = "fabioao@unipam.edu.br";
                    $to = "$email";
                    $subject = "Código de Verificação SGV";

                    $message = "
                    <html>
                    <body>
                    <p>Este é o teste de autenticação de duplo fator da SGV\n</p>
                    <p>O seu código de verificação é: $code \n</p>
                    </body>
                    </html>
                    ";

                    // It is mandatory to set the content-type when sending HTML email
                    $headers = "From:".$from."\r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // More headers. From is required, rest other headers are optional

                    mail($to,$subject,$message,$headers);

                    }
                    enviaemail($code,$email);
                }

                gerarcode($id);

                $registro = Cliente::find($id);
                return view('ecommerce.validacao',compact('registro'));


            }else{
                if($req->session()->exists('usuario')){
                    $usuario = Session::get('usuario');
                    $usuario[]=['usuario_id'=> $usuario->id,'nome'=> $usuario->nome,'telefone'=> $usuario->telefone, 'email' => $usuario->email, 'bairro' => $usuario->bairro, 'rua' => $usuario->rua, 'numCasa' => $usuario->numCasa];
                    session(['usuario' => $usuario]);
                }else{
                    Session::put('usuario', [
                        ['usuario_id'=> $usuario->id,'nome'=> $usuario->nome,'telefone'=> $usuario->telefone, 'email' => $usuario->email, 'bairro' => $usuario->bairro, 'rua' => $usuario->rua, 'numCasa' => $usuario->numCasa]
                    ]);
                }
                Session::put('logado', 'sim');
                return redirect()->route('ecommerce.dash');
            }

            }else{

            $cliente = DB::table('clientes')
            ->select()
            ->where('email', '=', $dados['email'])
            ->first();

            if($cliente != null){
                //INCREMENTA O NUMERO DE TENTATIVAS NO BANCO DE DADOS QUANDO É CHAMADA
                $bloqueio = DB::table('clientes')->increment('tentativa', +1, ['email' => $dados['email']]);

                if($cliente->tentativa >= 3){ //SE JÁ TIVER MAIS DE 3 TENTATIVAS ERRADAS A FUNÇÃO BLOQUEIA A CONTA.

                    date_default_timezone_set('America/Sao_Paulo');

                    $vencimentobloq = new DateTime;
                    $vencimentobloq->modify('+30 minutes');
                    $vencimentobloq->format('d-m-Y H:i:s');

                    $user = User::find($cliente->id);
                    $user->bloqueio = $vencimentobloq;
                    $user->tentativa = 0;
                    $user->save();

                    echo"<script language='javascript' type='text/javascript'>
                    alert('Sua conta esta bloqueada tente daqui 30 minutos.');window.location
                    .href='/login';</script>";
                }else{
                    return $bloqueio; //+1 TENTATIVA
                }
            }else{
            echo"<script language='javascript' type='text/javascript'>
                alert('Este email não possui cadastro.');window.location
                .href='/login';</script>";
            }
        }
    }

    public function validacao(Request $req, $id){

        $dados = $req->all();

        $cliente = Cliente::find($id);

        if($cliente->codverificacao == $dados['verificacao']){

            $cliente->verificado = 'S';
            $cliente->save();

            echo"<script language='javascript' type='text/javascript'>
            alert('Conta verificada com sucesso!');window.location
            .href='/login';</script>";

        }else{
            echo"<script language='javascript' type='text/javascript'>
                    alert('Código de verificação incorreto.');window.location
                    .href='/login';</script>";
        }

    }

    public function recuperasenha()
    {
        return view('ecommerce.validaemail');
    }

    public function validaemail(Request $req)
    {
        $dados = $req->all();
        $cliente = Cliente::where('email', $dados['email'])->first();

        if($cliente != null){

            function gerarcode($id){
                $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $max = strlen($caracteres) - 1;
                $code = "";

                for($i=0; $i < 10; $i++) {
                    $code .= $caracteres[mt_rand(0, $max)];
                }

                $cliente = Cliente::find($id);
                $cliente->codverificacao = $code;
                $email = $cliente->email;
                $cliente->save();

            function enviaemail($code,$email){
                $from = "fabioao@unipam.edu.br";
                $to = "$email";
                $subject = "Código de Verificação SGV";

                $message = "
                <html>
                <body>
                <p>Este é o teste de autenticação de duplo fator da SGV para a recuperação de sua senha.\n</p>
                <p>O seu código de verificação é: $code \n</p>
                </body>
                </html>
                ";

                // It is mandatory to set the content-type when sending HTML email
                $headers = "From:".$from."\r\n";
                $headers .= "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers. From is required, rest other headers are optional

                mail($to,$subject,$message,$headers);

                }
                enviaemail($code,$email);
            }
            gerarcode($cliente->id);
            $registro = $cliente;
            return view('ecommerce.recuperasenha',compact('registro'));
        }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Cliente não possui email cadastrado.');window.location
            .href='/login';</script>";
        }
    }

    public function validasenha(Request $req, $id)
    {
        $dados = $req->all();
        $cliente = Cliente::find($id);

        if($dados['senha']!=$dados['senha1']){
            echo"<script language='javascript' type='text/javascript'>
            alert('As senhas estão diferentes. Digite Novamente.');window.location
            .href='/site/recuperasenha';</script>";
        }else{
            if($cliente->codverificacao != $dados['codverificacao']){
                echo"<script language='javascript' type='text/javascript'>
                alert('O código de verificação digitado esta incorreto.');window.location
                .href='/site/recuperasenha';</script>";
            }else{
                $cliente->password = encrypt($dados['senha']);
                $cliente->save();
                echo"<script language='javascript' type='text/javascript'>
                alert('Senha alterada com sucesso.');window.location
                .href='/login';</script>";
            }
        }
        //return view('ecommerce.login');
    }

    public function privacidade()
    {
        return view('ecommerce.politicas.privacidade');
    }

    public function termosdeuso()
    {
        return view('ecommerce.politicas.termosdeuso');
    }

    public function quemsomos()
    {
        return view('ecommerce.politicas.quemsomos');
    }

    public function trocasedevolucoes()
    {
        return view('ecommerce.politicas.trocasedevolucoes');
    }

    public function contato()
    {
        return view('ecommerce.contato');
    }

    public function contatoenviar(){

        echo"<script language='javascript' type='text/javascript'>
                alert('Sua mensagem foi recebida! Em até 2 dias úteis ela será respondida.');window.location
                .href='/';</script>";
    }

    public function visualizaproduto($id){
        $produto = Produto::find($id);
        $produto["qtd"] = 1;
        return view('ecommerce.visualizaproduto', compact('produto'));
    }

    public function carrinho(Request $req){
        $cart = Session::get('cart');
        $registro = $cart;
        //dd($registro);
        if($cart){
        return view('ecommerce.carrinho', compact('registro'));
    }else{
        echo"<script language='javascript' type='text/javascript'>
                alert('Seu carrinho está vazio adicione algo nele primeiro.');window.location
                .href='/';</script>";
    }
    }

    public function adicionacarrinho(Request $request, $id){
        $dados = $request->all();

        $produto = Produto::find($id);

        if($request->session()->exists('cart')){
            $cart = Session::get('cart');
            $cart[]=['product_id'=> $produto->id,'valor'=> $produto->valor,'imagem'=> $produto->imagem, 'titulo' => $produto->titulo, 'nome' => $produto->nome, 'descricao' => $produto->descricao, 'qtd' => $dados['qtd']];
            session(['cart' => $cart]);
        }else{
            Session::put('cart', [
                ['product_id'=> $produto->id,'valor'=> $produto->valor,'imagem'=> $produto->imagem, 'titulo' => $produto->titulo, 'nome' => $produto->nome, 'descricao' => $produto->descricao, 'qtd' => $dados['qtd']]
            ]);
        }

        echo"<script language='javascript' type='text/javascript'>
                alert('Produto adicionado ao carrinho.');window.location
                .href='/';</script>";
    }

    public function fechamentoitens(){
        echo"<script language='javascript' type='text/javascript'>
                alert('Sistema de pagamento ainda em desenvolvimento. Obrigado por usar nosso site.');window.location
                .href='/';</script>";
    }

    public function retiraitem(Request $req){
        $req->session()->forget(["cart"]);
        echo"<script language='javascript' type='text/javascript'>
                alert('Carrinho limpo.');window.location
                .href='/';</script>";
    }

}
