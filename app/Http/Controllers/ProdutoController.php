<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class ProdutoController extends Controller
{
    public function home()
    {
        $registros = Produto::all();
        return view('admin.produto.homeproduto',compact('registros'));

    }

    public function cadastraproduto()
    {
        return view('admin.produto.cadastraproduto');
    }

    public function updateproduto(Request $req)
    {
        $dados = $req->all();

        function createproduto(array $dados){

            $criar = Produto::create([
                'nome' => $dados['nome'],
                'descricao' => $dados['descricao'],
                'valor' => $dados['valor'],
                'numEstoque' => $dados['numEstoque']
            ]);

            return $criar;

        }

        createproduto($dados);

        return redirect()->route('admin.produto.homeproduto');
    }

    public function editaproduto($id)
    {
        $registro = Produto::find($id);
        return view('admin.produto.editaproduto',compact('registro'));
    }

    public function atualizaproduto(Request $req, $id)
    {
        $dados = $req->all();

        Produto::find($id)->update($dados);

        return redirect()->route('admin.produto.homeproduto');
    }

    public function deletaproduto($id)
    {
        Produto::find($id)->delete();
        return redirect()->route('admin.produto.homeproduto');
    }
}
