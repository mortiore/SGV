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
<div style="padding: 40px;" class="input-field center">
    <img width="auto" height="300" src="{{asset($registro->imagem)}}">
</div>
@endif

<div class="input-field">
	<input type="text" name="valor" id="valor" value="{{ isset($registro->valor) ? $registro->valor : null }}">
	<label for="valor">Valor</label>
</div>

<div class="form-check">
  <label>
        <input name="ativo" type="checkbox" id="ativo" value= "{{ isset($registro->ativo) ? $registro->ativo : 'S' }}" />
        <span>Ativo</span>
      </label>
</div>


