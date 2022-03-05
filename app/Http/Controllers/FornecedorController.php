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
}
