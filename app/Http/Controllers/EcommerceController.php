<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SegurancaController;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class EcommerceController extends Controller
{

    public function dash()
    {
        return view('ecommerce.index');
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

}
