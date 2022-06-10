            <hr>
                <div class="row">
                    <div class=" col-sm-12 col-md-12">
                        <fieldset class="row">
                            <legend>Informe o código verificador que foi enviado para seu e-mail.</legend>
                            <div class="mb-3">
                                <label for="txtNome" class="form-label">Código de Verificação</label>
                                <input type="text" class="form-control" id="txtverificacao" name="verificacao" value="{{isset($registro->verificacao) ? $registro->verificacao : ''}}">
                            </div>
                        </fieldset>
                    </div>
                </div>
                <hr>
