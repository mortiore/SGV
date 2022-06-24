<?php
use Illuminate\Support\Facades\Session;
$req = Session::all();
if(isset($req['cart'])){

}else{
    $req['cart'] = "";
}
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

<body style="min-width: 360px; background-image:url('/img/cavalofundo.jpg');height: 1000px;
  background-position: center;
  background-size: cover;
  position: relative;">
    <nav style="background-color: black;" class="navbar navbar-expand-lg navbar-dark bg-selaria border-bottom shadow-sm mb-3">
        <div style="
            background-color: black;
            text-align: center;
            width: 100%;
            z-index: 3;" class="container">

            <?php if($req['logado'] = 'sim'){ ?>
                <a class="navbar-brand" href="{{ route('ecommerce.dash') }}"><strong>Selaria SGV</strong></a>
            <?php } else { ?>
                <a class="navbar-brand" href="{{ route('ecommerce.login') }}"><strong>Selaria SGV</strong></a>
            <?php }?>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item">
                    <?php if($req['logado'] = 'sim'){ ?>
                        <a href="{{ route('ecommerce.dash') }}" class="nav-link text-white">Início</a>
                    <?php } else { ?>
                         <a href="{{ route('ecommerce.login') }}" class="nav-link text-white">Início</a>
                    <?php }?>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('ecommerce.contato')}}" class="nav-link text-white">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('index')}}" class="nav-link text-white">Sistema Interno</a>
                    </li>
                </ul>
                <div class="align-self-end">
                    <ul class="navbar-nav">
                        <?php if($req['logado'] = 'sim'){ ?>
                        <li class="nav-item">
                            <a class="nav-link text-white">Você está logado.</a>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a href="{{route('ecommerce.cadastro')}}" class="nav-link text-white">Cadastrar-me</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('ecommerce.login')}}" class="nav-link text-white">Entrar</a>
                        </li>
                        <?php }?>

                        <?php if($req['cart']) { ?>
                        <li class="nav-item">
                        <a href="{{ route('ecommerce.carrinho')}}" class="nav-link text-white">Carrinho(<?php
                        print_r(count($req['cart']));
                        ?>)</a>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                        <a href="{{ route('ecommerce.carrinho')}}" class="nav-link text-white">Carrinho(0)</a>
                        </li>
                        <?php }?>
                        <?php if($req['logado'] = 'sim'){ ?>
                        <li class="nav-item">
                            <a class="nav-link text-white">Sair</a>
                        </li>
                        <?php } else { ?>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

