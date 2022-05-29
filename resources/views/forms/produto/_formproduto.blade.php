<div class="input-field">
	<input type="text" name="nome"   value="{{ isset($registro->nome) ? $registro->nome : null }}">
	<label for="nome">Nome</label>
</div>
<div class="input-field">
	<textarea type="text" name="descricao" id="descricao" class="materialize-textarea">{{ isset($registro->descricao) ? $registro->descricao : null }}</textarea>
	<label for="descricao">Descrição</label>
</div>

<div class="file-field input-field">
<div style="height: 50px;" class="btn blue">
    <span>Imagem</span>
    <input type="file" name="imagem">
</div>
<div class="file-path-wrapper">
    <input class="file-path validate" type="text">
</div>
</div>

@if(isset($registro->imagem))
<div class="input-field">
    <img width="150" src="{{asset($registro->imagem)}}">
</div>
@endif

<div class="input-field">
	<input type="text" name="valor" id="valor" value="{{ isset($registro->valor) ? $registro->valor : null }}">
	<label for="valor">Valor</label>
</div>

<div class="form-check">
  <input class="form-check-input" name="ativo" type="checkbox" id="ativo" value="{{ isset($registro->ativo) ? $registro->ativo : 'S' }}" checked>
  <label class="form-check-label" for="flexCheckChecked">
    Ativo
  </label>
</div>


