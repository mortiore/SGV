@extends ('layout.ecommerce')

@section('titulo','Login e-commerce')

@section('conteudo')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <form action="{{route('entrar.cliente')}}" method="put" class="col-sm-10 col-md-8 col-lg-6">
                <h1 class="mb-3">Faça login na sua conta</h1>

                {{ csrf_field() }}

                <div class="input-field">
                    <label style="color: #c29a5c;">Login</label>
                    <input type="text" name="email" required>
                </div>

                <div class="input-field">
                    <label style="color: #c29a5c;">Senha</label>
                    <input type="password" name="password" required>
                </div>

                    <div class="form-check mb-3">
                    <label>
                    <input type="checkbox" />
                    <span>Lembrar-se</span>
                    </label>
                    </div>

                    <button style="height: 60px; color: #c29a5c;" class="btn btn-secondary">Entrar <br><i class="material-icons">login</i></button>
                    <p class="mt-3">
                        Ainda não é cadastrado? <a href="{{route('ecommerce.cadastro')}}">Clique aqui</a> para se cadastrar.
                    </p>
                    <p class="mt-3">
                        Esqueceu sua senha? <a href="/src/recuperarsenha.html">Clique aqui</a> para recuperá-la.
                    </p>

                </form>
            </div>
        </div>
    </main>

    <div style="height: 273px;" class="d-block d-md-none"></div>
    <div style="height: 153px;" class="d-none d-md-block d-lg-none"></div>
    <div style="height: 129px;" class="d-none d-lg-block"></div>

@endsection
