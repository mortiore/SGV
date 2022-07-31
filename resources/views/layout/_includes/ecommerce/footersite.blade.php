<footer style="background-color: black;" class="border-top fixed-bottom text-muted bg-selaria">
        <div class="container">
            <div class="row py-3">
                <div style="color: white;" class="col-12 col-md-4 text-center text-md-start">
                    &copy; 2022 - Selaria SGV<br>
                    Rua Virtual Inexistente, 999, Patos de Minas/MG<br>
                    CNPJ 99.999.999/0001-99
                </div>
                <div class="col-12 col-md-4 text-center">
                    <a href="{{ route('ecommerce.privacidade') }}" class="text-decoration-none text-light">Politica de
                        Privacidade</a><br>
                    <a href="{{ route('ecommerce.termosdeuso') }}" class="text-decoration-none text-light">Termos de Uso</a><br>
                    <a href="{{ route('ecommerce.quemsomos') }}" class="text-decoration-none text-light">Quem Somos</a><br>
                    <a href="{{ route('ecommerce.trocasedevolucoes') }}" class="text-decoration-none text-light">Trocas e Devoluções</a>
                </div>
                <div style="color: white;" class="col-12 col-md-4 text-center text-md-end">
                    <a href="{{ route('ecommerce.contato') }}" class="text-decoration-none text-light">Administrativo</a><br>
                    E-mail: <a href="mailto:email@email.com"
                        class="text-decoration-none text-dark">email@email.com</a><br>
                    Telefone: <a href="phone:34999999999" class="text-decoration-none text-dark">(34) 9.9999-9999</a>

                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/javascript.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/zepto.min.js') }}"></script>
</body>

</html>
