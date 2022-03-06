        <div class="form-group">
            <label >Nome</label>
            <input type="text" class="form-control" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
        </div>

        <div class="form-group">
            <label >Descrição</label>
            <input type="text" class="form-control" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
        </div>
        <div class="form-group">
            <label >Valor</label>
            <input type="text" class="form-control" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}">
        </div>
        <div class="form-group">
            <label >numEstoque</label>
            <input type="number" class="form-control" name="numEstoque" value="{{isset($registro->numEstoque) ? $registro->numEstoque : ''}}">
        </div>
