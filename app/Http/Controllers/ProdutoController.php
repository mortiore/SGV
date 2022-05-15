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

        if($req->hasFile('imagem')){
            $imagem = $req->file('imagem');
            $num = rand(1111,9999);
            $dir = "img/produto/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "Imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        function createproduto(array $dados){

            $criar = Produto::create([
                'nome' => $dados['nome'],
                'descricao' => $dados['descricao'],
                'imagem' => $dados['imagem'],
                'valor' => $dados['valor'],
                'ativo' => $dados['ativo']
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

        if($req->hasFile('imagem')){
            $imagem = $req->file('imagem');
            $num = rand(1111,9999);
            $dir = "img/produto/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "Imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        Produto::find($id)->update($dados);

        return redirect()->route('admin.produto.homeproduto');
    }

    public function deletaproduto($id)
    {
        Produto::find($id)->delete();
        return redirect()->route('admin.produto.homeproduto');
    }
}
