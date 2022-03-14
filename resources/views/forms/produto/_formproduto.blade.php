        <div class="form-group">
            <label id="nome">Nome</label>
            <input id="linhas"id="nome" type="text" class="form-control" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
        </div>

        <div class="form-group">
            <label id="nome">Descrição</label>
            <input id="linhas"id="nome" type="text" class="form-control" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
        </div>
        <div class="form-group">
            <label id="nome">Valor</label>
            <input id="linhas"id="nome" type="text" class="form-control" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}">
        </div>
        <div class="form-group">
            <label id="nome">numEstoque</label>
            <input id="linhas"id="nome" type="number" class="form-control" name="numEstoque" value="{{isset($registro->numEstoque) ? $registro->numEstoque : ''}}">
        </div>
