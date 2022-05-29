<div class="form-group">
            <label  >Id</label>
            <input   type="text" class="form-control" id="disabledInput" name="id" value="{{isset($registro->id) ? $registro->id : ''}}" disabled="">
        </div>

        <div class="form-group">
            <label  >Senha Antiga</label>
            <input   type="password" class="form-control" name="password1" value="">
        </div>
        <div class="form-group">
            <label  >Nova Senha</label>
            <input   type="password" class="form-control" name="password" value="">
        </div>
        <div class="form-group">
            <label  >Repita a Senha</label>
            <input   type="password" class="form-control" name="password2" value="">
        </div>
