<div class="form-group">
            <label id="nome">Id</label>
            <input id="linhas" type="text" class="form-control" id="disabledInput" name="id" value="{{isset($registro->id) ? $registro->id : ''}}" disabled="">
        </div>

        <div class="form-group">
            <label id="nome">Senha Antiga</label>
            <input id="linhas" type="password" class="form-control" name="password1" value="">
        </div>
        <div class="form-group">
            <label id="nome">Nova Senha</label>
            <input id="linhas" type="password" class="form-control" name="password" value="">
        </div>
        <div class="form-group">
            <label id="nome">Repita a Senha</label>
            <input id="linhas" type="password" class="form-control" name="password2" value="">
        </div>
