<hr>
    <div class="row">
    <h1 class="mb-3">Recuperação de Senha</h1>
        <div class="form-floating mb-3">
            <label for="txtNome" class="form-label">E-mail</label>
            <input type="text" class="form-control" id="txtemail" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
        </div>
    </div>
<hr>
