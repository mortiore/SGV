@extends ('layout.ecommerce')

@section('titulo','Index e-commerce')

@section('conteudo')
<?php
use Illuminate\Support\Facades\Session;
$req = Session::all();
?>
<main>
        <div style="padding-bottom: 500px; border-radius: 10px; background-color: rgba(240, 240, 240, 0.3);" class="container">
            <div class="row">

            @foreach($produtos as $produto)
            <div class="col-sm-3">
            <div class="card border-light">
            <img src="{{asset($produto->imagem)}}" alt="{{$produto->titulo}}">
            <div class="card-footer border-top border-light p-4">
                <a href="#" class="h5">{{ $produto->nome }}</a>
                <p>{{ $produto->descricao }}</p>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="h6 mb-0 text-gray"><?php
                    $produto->valor = str_replace(".",",",$produto->valor);
                    ?>R$ {{ $produto->valor }}</span>
                    <a style="background-color: rgba(213, 127, 69, 0.8);" class="btn" href="{{ route('ecommerce.visualizaproduto',$produto->id) }}">Conferir</a>
                </div>
            </div>
        </div>
        </div>
                @endforeach

            </div>
        </div>
        <div style="padding-bottom: 140px;"></div>
</main>

@endsection
