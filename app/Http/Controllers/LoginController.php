<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exercicio;
use App\Models\Turma;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Turma_user;
use App\Models\Atividade;
use App\Models\PlanoAula;


class LoginController extends Controller
{
    public function home()
    {
        return view('index');
    }
}
