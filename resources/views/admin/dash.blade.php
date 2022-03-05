@extends ('layout.site')

@section('titulo','Sistema Interno GV')

@section('conteudo')
<style>
    .img{
        width: 200px !important;
        height: 200px !important;
    }
</style>
<div style="max-width: unset !important; background-color: #314153 ; padding-bottom: 20px;" class="container">

    <div style="width: 400px; padding-top: 30px;" class="container">

    <div style="box-shadow: 8px 5px 5px rgba(0, 0, 0, .3);" class="center">
        <img  style="width: 370px; height: 225px; object-fit: cover; object-position: 0px -70px;" src="{{ asset('/img/Selaria (2).png') }}"/>
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
  <div class="col-sm-4">
  <img class="card-img-top img" src="{{ asset('/img/fornecedor1.png') }}" alt="">
      <div class="card-body">
        <a href="{{route('admin.cliente.homecliente')}}" class="btn btn-secondary botaop">Clientes</a>
      </div>
  </div>
  <div class="col-sm-4">
  <img class="card-img-top img" src="{{ asset('/img/produto.png') }}" alt="">
      <div class="card-body">
        <a href="{{route('admin.produto.homeproduto')}}" class="btn btn-secondary botaop">Produtos</a>
      </div>
  </div>
  <div class="col-sm-4">
  <img class="card-img-top img" src="{{ asset('/img/fornecedor.png') }}" alt="">
      <div class="card-body">
        <a href="{{route('admin.fornecedor.homefornecedor')}}" class="btn btn-secondary botaop">Fornecedores</a>
      </div>
  </div>

</div>
</div>
</div>



</div>


@endsection
