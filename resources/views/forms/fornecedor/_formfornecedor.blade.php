        <div class="form-group">
            <label id="nome">Nome</label>
            <input id="linhas" type="text" class="form-control" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
        </div>
        <div class="form-group">
            <label id="nome">Telefone</label>
            <input id="linhas" type="text" class="form-control" name="telefone" value="{{isset($registro->telefone) ? $registro->telefone : ''}}">
        </div>
        <div class="form-group">
            <label id="nome">E-mail</label>
            <input id="linhas" type="email" class="form-control" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
        </div>
        <div class="form-group">
            <label id="nome">Bairro</label>
            <input id="linhas" type="text" class="form-control" name="bairro" value="{{isset($registro->bairro) ? $registro->bairro : ''}}">
        </div>
        <div class="form-group">
            <label id="nome">Rua</label>
            <input id="linhas" type="text" class="form-control" name="rua" value="{{isset($registro->rua) ? $registro->rua : ''}}">
        </div>
        <div class="form-group">
            <label id="nome">Nº</label>
            <input id="linhas" type="text" class="form-control" name="numCasa" value="{{isset($registro->numCasa) ? $registro->numCasa : ''}}">
        </div>
