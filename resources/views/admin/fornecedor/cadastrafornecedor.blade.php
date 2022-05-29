@extends ('layout.siteinterno')

@section('titulo','Cadastrar Fornecedor')

@section('conteudo')
<div style="width: 60%;padding-right: 0px;
    padding-left: 0px;
    margin-right: auto;
    margin-left: auto;border-radius: 5px; background-color: white; padding-bottom: 20px; border: 3px solid #c29a5c">
    <div style="background-color: #333;">
    <h1 style="padding-top: 20px;padding-bottom: 30px; color: antiquewhite;" class="center">CADASTRAR FORNECEDOR</h1>
    </div>
<div class="container">
<form action="{{route('admin.fornecedor.updatefornecedor')}}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}
    @include('forms.fornecedor._formfornecedor')

    <div class="form-group" style="text-align: center;">
        <input type="submit" value="Salvar" class="btn btn-color3">
    </div>
    </form>
</div>
</div>
@endsection
