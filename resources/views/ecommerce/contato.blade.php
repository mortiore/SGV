@extends ('layout.ecommerce')

@section('titulo','Politica de Privacidade')

@section('conteudo')

<main>
        <div class="container">

            <div class="row justify-content-center">
                <form class="col-sm-10 col-md-8 col-lg-6">
                    <h1 class="mb-3">Entre em contato</h1>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" autofocus id="txtNome" placeholder=" ">
                        <label for="txtNome">Nome Completo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" autofocus id="txtEmail" placeholder=" ">
                        <label for="txtEmail">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="txtMensagem" placeholder=" "
                        style="height: 200px;"></textarea>
                        <label for="txtMensagem">Mensagem</label>
                    </div>
                    <button class="btn btn-lg btn-selaria" type="button"
                    onclick="window.location.href='/src/confirmcontato.html'">Enviar Mensagem</button>

                    <p class="mt-3">
                        Faremos nosso melhor para responder sua mensagem em até 2 dias úteis.
                    </p>
                    <p class="mt-3">
                        Atenciosamente,<br>
                        Central de Relacionamento Selaria SGV.
                    </p>
                </form>
            </div>
        </div>
        <div style="padding-bottom: 140px;"></div>
    </main>

@endsection
