<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SegurancaController;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



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

            if($data > $usuario->vencimento){

            conferevalidade();

            return redirect()->route('admin.mudasenha');

            }else{

            return redirect()->route('admin.dashboard');

            }

        }else{
            echo"<script language='javascript' type='text/javascript'>
                alert('Favor digitar email e senha');window.location
                .href='/';</script>";
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

            if($senha != $senhaConfirma) {

                echo"<script language='javascript' type='text/javascript'>
                alert('As senhas não conferem, tente novamente.');window.location
                .href='/';</script>";
            }

            if($usuario->password1 == $dados['password']){
                echo"<script language='javascript' type='text/javascript'>
                    alert('Cadastre outra senha pois está já foi usada recentemente, tente novamente.');window.location
                    .href='/';</script>";
            }else{

            if($senha == $senhaConfirma){
            User::find($id)->update([
            'password' => bcrypt($dados['password'])
            ]);

            $usuario->vencimento = $novavencimento;
            $usuario->save();
            echo"<script language='javascript' type='text/javascript'>
                    alert('Senha alterada com sucesso!');window.location
                    .href='/';</script>";
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
