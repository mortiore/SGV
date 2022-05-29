                <h1>Informe seus dados</h1>
            <hr>
                <div class="row">
                    <div class=" col-sm-12 col-md-6">
                        <fieldset class="row">
                            <legend>Dados Pessoais</legend>
                            <div class="mb-3">
                                <label for="txtNome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="txtNome" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="txtCPF" class="form-label">CPF</label>
                                <span class="form-text">(somente números)</span>
                                <input type="text" class="form-control" id="txtCPF">
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="txtDtNasc" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="txtDtNasc">
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Contatos</legend>
                            <div class="mb-3 col-md-8">
                                <label for="txtEmail" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="txtEmail" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="txtTelefone" class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="txtTelefone" name="telefone" value="{{isset($registro->telefone) ? $registro->telefone : ''}}">
                                <span class="form-text">(com DDD, somente números)</span>
                            </div>
                        </fieldset>
                    </div>
                    <div class=" col-sm-12 col-md-6">
                        <fieldset class="row">
                            <legend>Endereço</legend>
                            <div class="mb-3 col-md-6 col-lg-4">
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="bairro" value="{{isset($registro->bairro) ? $registro->bairro : ''}}">
                            </div>
                            <div class="mb-3 col-md-6 col-lg-8 align-self-end">
                            <label>Rua</label>
                            <input type="text" class="form-control" name="rua" value="{{isset($registro->rua) ? $registro->rua : ''}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="txtNumero" class="form-label">Número</label>
                                <input type="text" class="form-control" id="txtNumero" name="numCasa" value="{{isset($registro->numCasa) ? $registro->numCasa : ''}}">
                            </div>
                            <div class="mb-3 col-md-8">
                                <label for="txtComplemento" class="form-label">Complemento</label>
                                <input type="text" class="form-control" id="txtComplemento">
                            </div>
                            <div class="mb-3">
                                <label for="txtReferencia" class="form-label">Referência</label>
                                <input type="text" class="form-control" id="txtReferencia">
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Senha de Acesso</legend>
                            <div class="mb-3">
                                <label for="txtSenha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="txtSenha" name="password" value="{{isset($registro->password) ? $registro->password : ''}}">
                            </div>
                            <div class="mb-3">
                                <label for="txtConfSenha" class="form-label">Confirmação de Senha</label>
                                <input type="password" class="form-control" id="txtConfSenha" name="password1" value="{{isset($registro->password1) ? $registro->password1 : ''}}">
                            </div>
                        </fieldset>
                    </div>
                </div>
                <hr>
                <div class="form-check mb-3">
                    <label>
                    <input type="checkbox" />
                    <span>Desejo Receber informações
                        sobre promoções.</span>
                    </label>
                </div>
