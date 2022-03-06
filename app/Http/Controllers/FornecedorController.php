<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class FornecedorController extends Controller
{
    public function home()
    {
        $registros = Fornecedor::all();
        return view('admin.fornecedor.homefornecedor',compact('registros'));

    }

    public function cadastrafornecedor()
    {
        return view('admin.fornecedor.cadastrafornecedor');
    }

    public function updatefornecedor(Request $req)
    {
        $dados = $req->all();

        function createfornecedor(array $dados){

            $criar = Fornecedor::create([
                'nome' => $dados['nome'],
                'telefone' => $dados['telefone'],
                'email' => $dados['email'],
                'bairro' => $dados['bairro'],
                'rua' => $dados['rua'],
                'numCasa' => $dados['numCasa']
            ]);

            return $criar;

        }

        createfornecedor($dados);

        return redirect()->route('admin.fornecedor.homefornecedor');
    }

    public function editafornecedor($idFornecedor)
    {
        $registro = Fornecedor::find($idFornecedor);
        return view('admin.fornecedor.editafornecedor',compact('registro'));
    }

    public function atualizafornecedor(Request $req, $idFornecedor)
    {
        $dados = $req->all();

        Fornecedor::find($idFornecedor)->update($dados);

        return redirect()->route('admin.fornecedor.homefornecedor');
    }

    public function deletafornecedor($idFornecedor)
    {
        Fornecedor::find($idFornecedor)->delete();
        return redirect()->route('admin.fornecedor.homefornecedor');
    }
}
