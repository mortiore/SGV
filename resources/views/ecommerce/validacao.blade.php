@extends ('layout.ecommerce')

@section('titulo','Cadastro SGV')

@section('conteudo')

<main>
            <div style="padding-bottom: 100px; border-radius: 10px; background-color: rgba(240, 240, 240, 0.8);" class="container">
            <form action="{{route('ecommerce.validacao',$registro->id)}}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            @include('forms.ecommerce._formvalidacao')

            <div class="form-group" style="text-align: center;">
        <input type="submit" value="Salvar" class="btn btn-color3">
    </div>
            </form>
        </div>
    </main>

@endsection
