@extends ('layout.ecommerce')

@section('titulo','Index e-commerce')

@section('conteudo')
<?php
use Illuminate\Support\Facades\Session;
$req = Session::all();
?>
<main>
    <div class="container" style="padding-top: 5px;"><p>
        <?php
        print_r($req['cart']);
        ?></p>
    </div>
        <div class="container">
            <div class="row">

            @foreach($produtos as $produto)
            <div class="col-sm-3">
            <div class="card border-light">
            <img src="{{asset($produto->imagem)}}" alt="{{$produto->titulo}}">
            <div class="card-footer border-top border-light p-4">
                <a href="#" class="h5">{{ $produto->nome }}</a>
                <p>{{ $produto->descricao }}</p>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="h6 mb-0 text-gray">R$ {{ $produto->valor }}</span>
                    <a class="btn btn-green" href="{{ route('ecommerce.visualizaproduto',$produto->id) }}">Conferir</a>
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
