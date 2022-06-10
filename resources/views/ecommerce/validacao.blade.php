@extends ('layout.ecommerce')

@section('titulo','Cadastro SGV')

@section('conteudo')

<main>
            <div class="container">
            <form action="{{route('ecommerce.validacao',$registro->id)}}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            @include('forms.ecommerce._formvalidacao')

            <div class="form-group" style="text-align: center;">
        <input type="submit" value="Salvar" class="btn btn-color3">
    </div>
            </form>
        </div>
    </main>

    <div style="height: 273px;" class="d-block d-md-none"></div>
    <div style="height: 153px;" class="d-none d-md-block d-lg-none"></div>
    <div style="height: 129px;" class="d-none d-lg-block"></div>

@endsection
