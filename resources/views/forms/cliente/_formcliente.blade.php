        <div class="form-group">
            <label  >Nome</label>
            <input   type="text" class="form-control" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
        </div>

        <div class="form-group">
            <label  >Telefone</label>
            <input   type="text" class="form-control" name="telefone" value="{{isset($registro->telefone) ? $registro->telefone : ''}}">
        </div>
        <div class="form-group">
            <label  >E-mail</label>
            <input   type="email" class="form-control" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
        </div>
        <div class="form-group">
            <label  >Bairro</label>
            <input   type="text" class="form-control" name="bairro" value="{{isset($registro->bairro) ? $registro->bairro : ''}}">
        </div>
        <div class="form-group">
            <label  >Rua</label>
            <input   type="text" class="form-control" name="rua" value="{{isset($registro->rua) ? $registro->rua : ''}}">
        </div>
        <div class="form-group">
            <label  >Nº</label>
            <input   type="text" class="form-control" name="numCasa" value="{{isset($registro->numCasa) ? $registro->numCasa : ''}}">
        </div>
