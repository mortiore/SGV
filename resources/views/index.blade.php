@extends ('layout.siteinterno')

@section('titulo','Área de Login')

@section('conteudo')
<div style="max-width: unset !important; background-color: #314153 ; padding-bottom: 20px;" class="container">

    <div style="padding-bottom: 30px; width: 400px; padding-top: 30px;" class="container">

    <div style="box-shadow: 8px 5px 5px rgba(0, 0, 0, .3);" class="center">
        <img  style="width: 370px; height: 225px; object-fit: cover; object-position: 0px -50px;" src="{{ asset('/img/Selaria.png') }}"/>
        <!--  -->
    </div>

    </div>

</div>

<div style="padding-bottom: 20px;" class="center">

<div style="width: 400px;" class="container">
        <h1 style="padding-top: 20px;padding-bottom: 20px; color: #c29a5c;" class="center">Portal Interno</h1>

        <div style="max-width: unset !important; background-color: #314153 ; padding-bottom: 20px; border-radius: 2.5%;" class="container">

            <div class="container" style="padding-top: 40px;">

                <form action="{{route('entrar')}}" method="put">

                {{ csrf_field() }}

                <div class="input-field">
                    <label style="color: #c29a5c;">Login</label>
                    <input type="text" name="email" required>
                </div>

                <div class="input-field">
                    <label style="color: #c29a5c;">Senha</label>
                    <input type="password" name="password" required>
                </div>

                <div style="padding-top: 30px; padding-bottom: 20px;" class="center">

                <button style="height: 60px; color: #c29a5c;" class="btn btn-secondary">Entrar <br><i class="material-icons">login</i></button>
                <p class="mt-3">
                        Ainda não é cadastrado? <a href="{{route('criaadm')}}">Clique aqui</a> para se cadastrar.
                    </p>

                </div>

                </form>

            </div>
        </div>
</div>


</div>


@endsection
