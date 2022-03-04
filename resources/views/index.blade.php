@extends ('layout.site')

@section('titulo','Sistema Interno GV')

@section('conteudo')

<div style="max-width: unset !important; background-color: #314153 ; padding-bottom: 20px;" class="container">

    <div style="width: 400px; padding-top: 30px;" class="container">

    <div style="box-shadow: 8px 5px 5px rgba(0, 0, 0, .3);" class="center">
        <img  style="width: 370px; height: 225px; object-fit: cover; object-position: 0px -40px;" src="{{ asset('/img/Selaria.png') }}"/>
        <!--  -->
    </div>

    </div>

    <div style="padding-bottom: 50px;"></div>

</div>

<div style="padding-top: 50px; padding-bottom: 30px;">
    <h1 style="text-align: center; color: #c29a5c; ">Soluções Inteligentes</h1>
</div>

<div>
<div style="padding-bottom: 20px;" class="center">

<div style="padding-top: 40px; padding-bottom: 30px; background-color: #314153;">
<div class="container">
<div class="row">
  <div class="col-sm-3">
  <img class="card-img-top" style="width: 50%" src="{{ asset('/img/usuario.jpg') }}" alt="">
      <div class="card-body">
        <a href="#" class="btn btn-secondary">Cadastrar Cliente</a>
      </div>
  </div>
  <div class="col-sm-3">
  <img class="card-img-top" style="width: 50%" src="{{ asset('/img/usuario.jpg') }}" alt="">
      <div class="card-body">
        <a href="#" class="btn btn-secondary">Cadastrar Produto</a>
      </div>
  </div>
  <div class="col-sm-3">
  <img class="card-img-top" style="width: 50%" src="{{ asset('/img/usuario.jpg') }}" alt="">
      <div class="card-body">
        <a href="#" class="btn btn-secondary">Cadastrar Fornecedor</a>
      </div>
  </div>
  <div class="col-sm-3">
  <img class="card-img-top" style="width: 50%" src="{{ asset('/img/usuario.jpg') }}" alt="">
      <div class="card-body">
        <a href="#" class="btn btn-secondary">Visualizar Cadastros</a>
      </div>
  </div>
</div>
</div>
</div>



</div>


@endsection
