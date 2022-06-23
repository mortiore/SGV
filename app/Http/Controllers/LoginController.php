<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;



class LoginController extends Controller
{

    public function home()
    {
        return view('index');
    }

    public function dashboard()
    {
        return view('admin.dash');
    }

    public function criaadm()
    {
        function createcliente(){

            $criar = User::create([
                'name'=>'Fabio',
                'email'=>'admin@admin.com',
                'password'=>bcrypt("123456")
            ]);

            return $criar;

        }

        createcliente();
        echo"<script language='javascript' type='text/javascript'>
        alert('Você cadastrou o usuario ADM com sucesso!');window.location
        .href='/interno';</script>";

    }

    public function entrar(Request $req)
    {

        $dados = $req->all();
        if (Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']]))
        {   date_default_timezone_set('America/Sao_Paulo');

            $dataatual = new DateTime();
            $data = $dataatual->format('Y-m-d H:i:s');

            $id = Auth::user()->id;
            $usuario = User::find($id);


            function conferevalidade(){

                $user = User::find(Auth::user()->id);
                $user->password1 = $user->password;
                $user->save();

            }

            if($data < $usuario->bloqueio){
                echo"<script language='javascript' type='text/javascript'>
                    alert('Sua conta esta bloqueada, tente mais tarde.');window.location
                    .href='/interno';</script>";
            }else{

            if($data > $usuario->vencimento){

            conferevalidade();

            return redirect()->route('admin.mudasenha');

            }else{

            return redirect()->route('admin.dashboard');

            }}

        }else{

            $users = DB::table('users')
            ->select()
            ->where('email', '=', $dados['email'])
            ->first();

            if($users != null){
                //INCREMENTA O NUMERO DE TENTATIVAS NO BANCO DE DADOS QUANDO É CHAMADA
                $bloqueio = DB::table('users')->increment('tentativa', +1, ['email' => $dados['email']]);

                if($users->tentativa >= 3){ //SE JÁ TIVER MAIS DE 3 TENTATIVAS ERRADAS A FUNÇÃO BLOQUEIA A CONTA.

                    date_default_timezone_set('America/Sao_Paulo');

                    $vencimentobloq = new DateTime;
                    $vencimentobloq->modify('+30 minutes');
                    $vencimentobloq->format('d-m-Y H:i:s');

                    $user = User::find($users->id);
                    $user->bloqueio = $vencimentobloq;
                    $user->tentativa = 0;
                    $user->save();

                    echo"<script language='javascript' type='text/javascript'>
                    alert('Sua conta esta bloqueada tente daqui 30 minutos.');window.location
                    .href='/interno';</script>";
                }else{
                    return $bloqueio; //+1 TENTATIVA
                }
            }else{
            echo"<script language='javascript' type='text/javascript'>
                alert('Este email não possui cadastro.');window.location
                .href='/interno';</script>";
            }
        }
    }

    public function mudasenha(){
        $id = Auth::user()->id;
        $registro = User::find($id);
        return view('admin.seguranca.editasenha',compact('registro'));

    }

    public function atualizasenha(Request $req, $id){
        date_default_timezone_set('America/Sao_Paulo');
        $novavencimento = new DateTime;
        $novavencimento->modify('+15 day');
        $novavencimento->format('d-m-Y H:i:s');
        $dados = $req->all();
        $usuario = User::select('id')->where('id', '=', Auth::user()->id)->first();

        if($dados){
            $senha          = $dados['password'];
            $senhaConfirma  = $dados['password2'];

            if($senha != $senhaConfirma) { //CONFERE SE A SENHA E A CONFIRMAÇÃO DA SENHA SÃO DIFERENTES

                echo"<script language='javascript' type='text/javascript'>
                alert('As senhas não conferem, tente novamente.');window.location
                .href='/interno';</script>";
            }

            if($usuario->password1 == $dados['password']){ //CONFERE SE A SENHA COLOCADA JÁ TINHA SIDO USADO PELO USUARIO
                echo"<script language='javascript' type='text/javascript'>
                    alert('Cadastre outra senha pois está já foi usada recentemente, tente novamente.');window.location
                    .href='/interno';</script>";
            }else{

            if($senha == $senhaConfirma){ //SE A SENHA BATER COM A CONFIRMAÇÃO DA SENHA, ELA É CRIPTOGRAFADA E COLOCADA EM BANCO
            User::find($id)->update([
            'password' => bcrypt($dados['password'])
            ]);

            $usuario->vencimento = $novavencimento; //COLOCA UM NOVO VENCIMENTO PARA DAQUI 15 DIAS
            $usuario->save();
            echo"<script language='javascript' type='text/javascript'>
                    alert('Senha alterada com sucesso!');window.location
                    .href='/interno';</script>";
                }

            }
        }
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('index');
    }


}
