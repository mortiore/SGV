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

<body style="background-color: #3b4f66;">

<style>
    *{
        font-family: sans-serif;
    }

</style>

<header>
    <nav>
        <div style="background-color: #314153; border-bottom: 2px solid; border-color:black;" class="nav-wrapper">

            <a
            <?php if(Auth::check()) { ?>
            href="{{route('admin.dashboard')}}"
            <?php } else { ?>
            href="{{route('index')}}"
            <?php } ?>

            style="color: #c29a5c; text-decoration: none !important;" class="brand-logo center">Selaria GV</a>


           <?php if(Auth::check()) { ?>
        <ul style="color: black; text-decoration: none !important;" class="right">
        <li><a class="btn" style="background-color: #c29a5c; color: antiquewhite; text-decoration: none !important;"href="{{route('sair')}}">Sair</a></li>
        </ul>
          <?php } else { ?>
        <ul style="color: black; text-decoration: none !important;" class="right">
        <li><a class="btn" style="background-color: #c29a5c; color: antiquewhite; text-decoration: none !important;"href="{{route('entrar')}}">Entrar</a></li>
        </ul>
           <?php } ?>

        </div>

    </nav>

</header>
