@extends ('layout.ecommerce')

@section('titulo','Recuperação de Senha')

@section('conteudo')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <form class="col-sm-10 col-md-8 col-lg-6" action="{{route('ecommerce.validasenha',$registro->id)}}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                @include('forms.ecommerce._formrecuperasenha')

                <input class="btn btn-lg btn-selaria" type="submit" value="Recuperar Senha" class="btn btn-color3">
                </form>
            </div>
        </div>
        <div style="padding-bottom: 140px;"></div>
    </main>

@endsection
