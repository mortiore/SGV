@extends ('layout.ecommerce')

@section('titulo','Politica de Privacidade')

@section('conteudo')

<main>
        <div style="padding-top: 30px; padding-bottom: 10px; border-radius: 10px; background-color: rgba(240, 240, 240, 0.6);" class="container">

            <div class="row justify-content-center">
                <form class="col-sm-10 col-md-8 col-lg-6">
                    <h1 class="mb-3">Entre em contato</h1>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" autofocus id="txtNome" placeholder=" ">
                        <label style="color: black; font-size: 16px;" for="txtNome">Nome Completo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" autofocus id="txtEmail" placeholder=" ">
                        <label style="color: black; font-size: 16px;" for="txtEmail">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="txtMensagem" placeholder=" "
                        style="height: 200px;"></textarea>
                        <label style="color: black; font-size: 16px;" for="txtMensagem">Mensagem</label>
                    </div>
                    <p>
                    <a style="background-color: rgba(213, 127, 69, 0.8);" class="btn" href="{{ route('ecommerce.contatoenviar') }}">Enviar Mensagem</a>
                    </p>

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
