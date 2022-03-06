@extends ('layout.site')

@section('titulo','Cadastrar Produto')

@section('conteudo')
<div style="border-radius: 5px; background-color: white; padding-bottom: 20px; border: 3px solid #c29a5c" class="titulo1">
    <div style="background-color: #333;">
    <h1 style="padding-top: 20px;padding-bottom: 30px; color: antiquewhite;" class="center">CADASTRAR PRODUTO</h1>
    </div>
<div class="container">
<form action="{{route('admin.produto.updateproduto')}}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}
    @include('forms.produto._formproduto')

    <div class="form-group" style="text-align: center;">
        <input type="submit" value="Salvar" class="btn bu2">
    </div>
    </form>
</div>
</div>
@endsection
