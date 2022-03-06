@extends ('layout.site')

@section('titulo','Editando Produto')

@section('conteudo')
<div style="border-radius: 50px; background-color: white; padding-bottom: 20px;" class="container">

<h3 style="padding-top: 20px;padding-bottom: 30px;" class="center">Editando Produto</h3>

<form action="{{route('admin.produto.atualizaproduto',$registro->idProduto)}}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('forms.produto._formproduto')


    <div style="padding-top: 30px; padding-bottom: 20px;" class="center">
        <button class="btn deep-teal">Salvar</button>
    </div>

</form>
<div style="padding-bottom: 40px;"></div>

</div>
@endsection
