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

        return redirect()->route('ecommerce.login');
    }

}
