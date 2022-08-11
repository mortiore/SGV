@extends ('layout.ecommerce')

@section('titulo','Conferindo')

@section('conteudo')

<main>
    <div style="padding-top: 30px; padding-bottom: 200px; border-radius: 10px; background-color: rgba(240, 240, 240, 0.9);" class="container">
    <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
            <td width="1%" nowrap="nowrap">
                <img src="{{asset($produto->imagem)}}" class="img-thumbnail" id="imgProduto">
            </td>
            <td>
                <center>
                    <div>
                    <h1 style="text-align: center;">{{ $produto->nome }}</h1>
                    <br>
                    </div>
                    <div>
                    <br>
                    <br>
                    <span style="color: black; font-size: 50px;" class="h6 mb-0 text-gray">
                    <?php
                    $produto->valor = str_replace(".",",",$produto->valor);
                    ?>R$ {{ $produto->valor }}</span>
                    </div>
                </center>
            </td>
        </tr>
         <tr>
            <td width="1%" nowrap="nowrap">
                <p style="font-size: 28px; padding-left: 10px;">Descrição do Produto:</p>
            </td>
        </tr>
        <tr>
            <td width="1%" nowrap="nowrap">
                <p style="color: black; font-size: 20px; padding-left: 10px;">{{ $produto->descricao }}</p>
            </td>
        </tr>
        <tr>
            <td width="1%" nowrap="nowrap">
                <p style="color: black; font-size: 20px; padding-left: 10px;">Dimensões: XXXXXXXX</p>
            </td>
            <form action="{{ route('ecommerce.adicionacarrinho', $produto->id) }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            @include('forms.ecommerce._formproduto')

        </tr>
        <tr>
            <td></td>
            <td width="1%" nowrap="nowrap">
                <center>
                    <input style="text-align: center;" class="btn btn-lg btn-selaria" type="submit" value="Adicionar ao Carrinho" class="btn btn-color3">
                </center>
            </td>
        </tr>
            </form>
        </table>
        </div>
    </main>

@endsection
