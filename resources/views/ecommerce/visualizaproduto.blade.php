@extends ('layout.ecommerce')

@section('titulo','Conferindo')

@section('conteudo')

<main>
        <div class="container">
            <div class="row g3">
                <div class="col-12 col-sm-6">
                    <img src="{{asset($produto->imagem)}}" class="img-thumbnail" id="imgProduto">
                </div>
                <div class="col-12 col-sm-6">
                    <h1>{{ $produto->nome }}</h1>
                    <p>{{ $produto->descricao }}</p>
                    <p>Descrição completa</p>
                    <span class="h6 mb-0 text-gray">R$ {{ $produto->valor }}</span>
                    <p>
                    <a class="btn btn-green" href="{{ route('ecommerce.adicionacarrinho',$produto->id) }}">Adicionar ao Carrinho</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

@endsection
