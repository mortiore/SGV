@extends ('layout.ecommerce')

@section('titulo','Recuperação de Senha')

@section('conteudo')

    <main>
        <div style="padding-bottom: 100px; border-radius: 10px; background-color: rgba(240, 240, 240, 0.8);" class="container">
            <div class="row justify-content-center">
                <form class="col-sm-10 col-md-8 col-lg-6" action="{{route('ecommerce.validaemail')}}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                @include('forms.ecommerce._formvalidaemail')

                <input class="btn btn-lg btn-selaria" type="submit" value="Recuperar Senha" class="btn btn-color3">
                </form>
            </div>
        </div>
        <div style="padding-bottom: 140px;"></div>
    </main>

@endsection

