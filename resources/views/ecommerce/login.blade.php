@extends ('layout.ecommerce')

@section('titulo','Login e-commerce')

@section('conteudo')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <form class="col-sm-10 col-md-8 col-lg-6">
                    <h1 class="mb-3">Faça login na sua conta</h1>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" autofocus id="txtEmail" placeholder=" ">
                        <label for="txtEmail">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" autofocus id="txtSenha" placeholder=" ">
                        <label for="txtSenha">Senha</label>
                    </div>

                    <div class="form-check mb-3">
                    <label>
                    <input type="checkbox" />
                    <span>Lembrar-se</span>
                    </label>
                    </div>

                    <button class="btn btn-lg btn-selaria" type="button">Entrar</button>
                    <p class="mt-3">
                        Ainda não é cadastrado? <a href="/src/cadastro.html">Clique aqui</a> para se cadastrar.
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
