@extends ('layout.site')

@section('titulo','Cadastra Fornecedor')

@section('conteudo')
<div style="border-radius: 50px; background-color: white; padding-bottom: 20px;" class="container">
    <h3 style="padding-top: 20px;padding-bottom: 30px;" class="center">Cadastrar Fornecedor</h3>

<div class="container">
<form action="{{route('admin.fornecedor.updatefornecedor')}}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}
    @include('forms.fornecedor._formfornecedor')

    <div class="form-group btn-teal" style="text-align: center;">
        <input type="submit" value="Salvar" class="btn">
    </div>
    </form>
</div>
</div>
@endsection
