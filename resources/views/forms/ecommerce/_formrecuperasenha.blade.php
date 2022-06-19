<hr>
    <div class="row">
    <h1 class="mb-3">Recuperação de Senha</h1>
    <h2>Instruções Enviadas!</h2>
            <p>
                Caro cliente,
            </p>
            <p>
                Abra a mensagem que lhe enviamos e digite o seu código de verificação logo abaixo, juntamente com a nova senha que desejar.
            </p>
            <p>
                Desde já, agradecemos pela confiança em nossos serviços.
            </p>
            <p>
                Atenciosamente,<br>
                Central de Relacionamente Selaria SGV.
            </p>
        <div class="form-floating mb-3">
            <label for="txtNome" class="form-label">Código de Verificação</label>
            <input type="text" class="form-control" id="txtcodverificacao" name="codverificacao" value="{{isset($registro->codverificacao) ? $registro->codverificacao : ''}}">
        </div>
        <div class="form-floating mb-3">
            <label for="txtNome" class="form-label">Nova Senha</label>
            <input type="text" class="form-control" id="txtsenha" name="senha" value="{{isset($registro->senha) ? $registro->senha : ''}}">
        </div>
        <div class="form-floating mb-3">
            <label for="txtNome" class="form-label">Confirmação da Senha</label>
            <input type="text" class="form-control" id="txtsenha1" name="senha1" value="{{isset($registro->senha1) ? $registro->senha1 : ''}}">
        </div>
    </div>
<hr>
