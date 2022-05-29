<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>@yield('titulo')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap%27">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body style="min-width: 360px;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-selaria border-bottom shadow-sm mb-3">
        <div class="container">
            <a class="navbar-brand" href="/index.html"><strong>Selaria SGV</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item">
                        <a href="/index.html" class="nav-link text-white">Início</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">Dropdown?</a>
                    </li>
                    <li class="nav-item">
                        <a href="/src/contato.html" class="nav-link text-white">Contato</a>
                    </li>
                </ul>
                <div class="align-self-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('ecommerce.cadastro')}}" class="nav-link text-white">Cadastrar-me</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('ecommerce.login')}}" class="nav-link text-white">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="carrinho.html" class="nav-link text-white">
                                <svg class="bi" width="24" height="24" fill="currentColor">
                                    <use xlink:href="/bi.svg#cart3" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

