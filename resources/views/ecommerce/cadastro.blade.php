@extends ('layout.ecommerce')

@section('titulo','Cadastro SGV')

@section('conteudo')

<main>
            <div class="container">
            <form action="{{route('ecommerce.updatecliente')}}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            @include('forms.ecommerce._formcliente')

                <div class="mb-3">
                    <a class="btn btn-light btn-outline-danger" href="{{route('ecommerce.login')}}">Cancelar</a>
                    <input type="button" value="Criar meu Cadastro" class="btn btn-danger"
                    onclick="window.location.href='/confirmarcadastro.html'">
                </div>
            </form>
        </div>
    </main>

    <div style="height: 273px;" class="d-block d-md-none"></div>
    <div style="height: 153px;" class="d-none d-md-block d-lg-none"></div>
    <div style="height: 129px;" class="d-none d-lg-block"></div>

@endsection
