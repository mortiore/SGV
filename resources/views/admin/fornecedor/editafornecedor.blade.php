@extends ('layout.site')

@section('titulo','Editando Fornecedor')

@section('conteudo')
<div style="border-radius: 5px; background-color: white; padding-bottom: 20px; border: 3px solid #c29a5c" class="titulo1">
    <div style="background-color: #333;">
    <h1 style="padding-top: 20px;padding-bottom: 30px; color: antiquewhite;" class="center">EDITANDO FORNECEDOR</h1>
    </div>
<div class="container">
<form action="{{route('admin.fornecedor.atualizafornecedor',$registro->idFornecedor)}}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('forms.fornecedor._formfornecedor')


    <div style="padding-top: 30px; padding-bottom: 20px;" class="center">
        <button class="btn bu2">Salvar</button>
    </div>

</form>
</div>
</div>
@endsection
