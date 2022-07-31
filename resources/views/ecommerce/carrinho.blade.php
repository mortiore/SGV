@extends ('layout.ecommerce')

@section('titulo','Index e-commerce')

@section('conteudo')
<?php
use Illuminate\Support\Facades\Session;
$req = Session::all();
?>
<main>
        <div style="padding-bottom: 500px; border-radius: 10px; background-color: rgba(240, 240, 240, 0.8);" class="container">
            <h1 style="padding-top: 30px;">Carrinho de Compras</h1>
            <hr>
            <h1><?php //print_r($registro); die();?></h1>
            <ul class="list-group mb-3">

            <?php for($i = 0;$i < count($registro); $i++){ ?>
            <li class="list-group-item py-3">
                    <div class="row g-3">
                        <div class="col-4 col-md-3 col-lg-2">
                            <a href="#">
                                <img style="max-width: 200px; max-height: 170px;" src="{{asset($registro[$i]['imagem'])}}" alt="{{ $registro[$i]['titulo'] }}">
                            </a>
                        </div>
                        <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-start align-self-center">
                            <h4><b><a href="#" class="text-decoration-none text-danger">{{ $registro[$i]['nome'] }}</a></b></h4>
                            <h4><small>{{ $registro[$i]['descricao'] }}</small></h4>
                        </div>
                        <div class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-0
                        col-xl-2 align-self-center mt-3">

                            <div class="text-end mt-2">
                                <span class="text-dark">Valor: R$ {{ $registro[$i]['valor'] }}</span>
                            </div>

                        </div>
                    </div>
            </li>
            <?php } ?>



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
                        <a href="{{ route('ecommerce.dash') }}" class="btn btn-success">
                            Continuar Comprando
                        </a>
                        <a href="{{ route('ecommerce.retiraitem') }}" style="background-color: rgba(13, 216, 230, 0.8);" class="btn">
                            Limpar Carrinho
                        </a>
                        <a href="{{ route('controle.pagamento') }}" class="btn btn-green">
                            Fechar Compra
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div style="padding-bottom: 140px;"></div>
    </main>

@endsection
