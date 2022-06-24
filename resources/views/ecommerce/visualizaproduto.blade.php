@extends ('layout.ecommerce')

@section('titulo','Conferindo')

@section('conteudo')

<main>
        <div style="padding-top: 30px; padding-bottom: 500px; border-radius: 10px; background-color: rgba(240, 240, 240, 0.3);" class="container">
            <div class="row g3">
                <div style="padding-bottom: 30px;" class="col-12 col-sm-12">
                    <img src="{{asset($produto->imagem)}}" class="img-thumbnail" id="imgProduto">
                </div>
                <div style="padding-top: 30px; border-radius: 10px; background-color: rgba(240, 240, 240, 0.8)" class="col-6 col-sm-12">
                    <h1>{{ $produto->nome }}</h1>
                    <br>
                    <p style="color: black; font-size: 20px;">{{ $produto->descricao }}</p>
                    <br><br>
                    <p style="color: black; font-size: 20px;">Dimensões: XXXXXXXX</p>
                    <br>
                    <span style="color: black; font-size: 50px;" class="h6 mb-0 text-gray">
                    <?php
                    $produto->valor = str_replace(".",",",$produto->valor);
                    ?>R$ {{ $produto->valor }}</span>
                    <p><br>
                    <a class="btn btn-green" href="{{ route('ecommerce.adicionacarrinho',$produto->id) }}">Adicionar ao Carrinho</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

@endsection
