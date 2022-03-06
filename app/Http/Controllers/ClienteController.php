<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class ClienteController extends Controller
{
    public function home()
    {
        $registros = Cliente::all();
        return view('admin.cliente.homecliente',compact('registros'));

    }

    public function cadastracliente()
    {
        return view('admin.cliente.cadastracliente');
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
                'numCasa' => $dados['numCasa']
            ]);

            return $criar;

        }

        createcliente($dados);

        return redirect()->route('admin.cliente.homecliente');
    }

    public function editacliente($id)
    {
        $registro = Cliente::find($id);
        return view('admin.cliente.editacliente',compact('registro'));
    }

    public function atualizacliente(Request $req, $id)
    {
        $dados = $req->all();

        Cliente::find($id)->update($dados);

        return redirect()->route('admin.cliente.homecliente');
    }

    public function deletacliente($id)
    {
        Cliente::find($id)->delete();
        return redirect()->route('admin.cliente.homecliente');
    }
}
