@extends ('layout.ecommerce')

@section('titulo','Index e-commerce')

@section('conteudo')
<?php
use Illuminate\Support\Facades\Session;
$req = Session::all();
?>
<main>
        <div class="container">
            <h1>Carrinho de Compras</h1>
            <hr>
            <ul class="list-group mb-3">

            @foreach($registro as $registros)
            <li class="list-group-item py-3">
                    <div class="row g-3">
                        <div class="col-4 col-md-3 col-lg-2">
                            <a href="#">
                                <img style="max-width: 200px; max-height: 170px;" src="{{asset($registros->imagem)}}" alt="{{$registros->titulo}}">
                            </a>
                        </div>
                        <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-start align-self-center">
                            <h4><b><a href="#" class="text-decoration-none text-danger">{{ $registros->nome }}</a></b></h4>
                            <h4><small>{{ $registros->descricao }}</small></h4>
                        </div>
                        <div class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-0
                        col-xl-2 align-self-center mt-3">

                            <div class="text-end mt-2">
                                <span class="text-dark">Valor: R$ {{ $registros->valor }}</span>
                            </div>
                        </div>
                    </div>
            </li>
             @endforeach


                <li class="list-group-item py-3">
                    <div class="text-end">
                        <?php
                        $valorAltString = "";
                        $valorAltInt = 0;
                        $valorFinal = 0;
                        for($i = 0;$i < count($registro); $i++){
                            $valorAltInt = floatval($registro[$i]['valor']);
                            $valorFinal += $valorAltInt;
                            $valorCarrinho = strval($valorFinal);
                        }
                        $valorCarrinho = number_format($valorCarrinho, 2, ',', ' ');
                        ?>
                        <h4 class="text-dark mb-3">Valor Total: R$ <?php print_r($valorCarrinho) ?></h4>
                        <a href="{{ route('ecommerce.dash') }}" class="btn btn-outline-success btn-lg">
                            Continuar Comprando
                        </a>
                        <a href="{{ route('ecommerce.fechamentoitens') }}" class="btn btn-danger btn-lg">
                            Fechar Compra
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div style="padding-bottom: 140px;"></div>
    </main>

@endsection
