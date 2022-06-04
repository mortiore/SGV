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
        if (Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']]))
        {   date_default_timezone_set('America/Sao_Paulo');

            $dataatual = new DateTime();
            $data = $dataatual->format('Y-m-d H:i:s');

            $id = Auth::cliente()->id;
            $usuario = Cliente::find($id);


            function conferevalidade(){

                $cliente = Cliente::find(Auth::cliente()->id);
                $cliente->password1 = $cliente->password;
                $cliente->save();

            }

            if($data < $usuario->bloqueio){
                echo"<script language='javascript' type='text/javascript'>
                    alert('Sua conta esta bloqueada, tente mais tarde.');window.location
                    .href='/';</script>";
            }else{

            if($data > $usuario->vencimento){

            conferevalidade();

            return redirect()->route('admin.mudasenha');

            }else{

            if($usuario->verificado == 'N'){

                function gerarcode(){
                    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    $max = strlen($caracteres) - 1;
                    $code = "";

                    for($i=0; $i < 10; $i++) {
                        $code .= $caracteres[mt_rand(0, $max)];
                    }

                    $cliente = Cliente::find(Auth::cliente()->id);
                    $cliente->verificacao = $code;
                    $email = $cliente->email;
                    $cliente->save();

                    function enviaemail($code,$email){
                    $to = "$email";
                    $subject = "Código de Verificação SGV";

                    $message = "
                    <html>
                    <head>
                    <title>Este é o teste de autenticação de duplo fator da SGV</title>
                    </head>
                    <body>
                    <p>O seu código de verificação é: $code </p>
                    </body>
                    </html>
                    ";

                    // It is mandatory to set the content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // More headers. From is required, rest other headers are optional
                    $headers .= "From: fabioao@unipam.edu.br";

                    mail($to,$subject,$message,$headers);
                    }

                    enviaemail($code,$email);
                }

                gerarcode();

                return redirect()->route('ecommerce.validacao');


            }else{
                return redirect()->route('admin.dashboard');
            }

            }}

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
                    .href='/';</script>";
                }else{
                    return $bloqueio; //+1 TENTATIVA
                }
            }else{
            echo"<script language='javascript' type='text/javascript'>
                alert('Este email não possui cadastro.');window.location
                .href='/';</script>";
            }
        }
    }

}
