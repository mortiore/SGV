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
}
