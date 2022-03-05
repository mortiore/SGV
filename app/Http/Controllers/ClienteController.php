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
}
