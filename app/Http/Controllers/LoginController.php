<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        {
            return redirect()->route('admin.dashboard');

        }else{
            echo"<script language='javascript' type='text/javascript'>
                alert('Favor digitar email e senha');window.location
                .href='/';</script>";
        }
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('index');
    }


}
