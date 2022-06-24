@extends ('layout.ecommerce')

@section('titulo','Login e-commerce')

@section('conteudo')

    <main>
        <div style="padding-bottom: 500px; border-radius: 10px; background-color: rgba(240, 240, 240, 0.8);" class="container">
            <div style="padding-top: 30px;" class="row justify-content-center">
                <form action="{{route('entrar.cliente')}}" method="put" class="col-sm-10 col-md-8 col-lg-6">
                <center>
                <h1 style="padding-top: 30px; padding-bottom: 50px;" class="mb-3">Faça login na sua conta</h1>
                </center>

                {{ csrf_field() }}

                <div style="padding-top: 30px;" class="input-field">
                    <label style="color: black;">Login</label>
                    <input type="text" name="email" required>
                </div>

                <div style="padding-top: 30px;" class="input-field">
                    <label style="color: black;">Senha</label>
                    <input type="password" name="password" required>
                </div>

                    <div style="padding-bottom: 50px;" class="form-check mb-3">
                    <label>
                    <input type="checkbox" />
                    <span>Lembrar-se</span>
                    </label>
                    </div>
                    <center>
                    <button style="height: 60px; background-color: rgba(213, 127, 69, 0.8);" class="btn btn-secondary">Entrar <br><i class="material-icons">login</i></button>
                    <p style="padding-top: 80px;" class="mt-3">
                        Ainda não é cadastrado? <a href="{{route('ecommerce.cadastro')}}">Clique aqui</a> para se cadastrar.
                    </p>
                    <p class="mt-3">
                        Esqueceu sua senha? <a href="{{route('ecommerce.recuperasenha')}}">Clique aqui</a> para recuperá-la.
                    </p>
                    </center>

                </form>
            </div>
        </div>
    </main>
@endsection
