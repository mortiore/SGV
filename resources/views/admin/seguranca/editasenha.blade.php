@extends ('layout.siteinterno')

@section('titulo','Mudança de Senha')

@section('conteudo')
<style>
    #buttom{
        pointer-events: none;
    }
</style>
<div class="container center" style="padding-bottom: 20px;">
<div id="buttom" class="btn btn-danger">
    <p>Sua senha expirou, altere sua senha para continuar.</p>
</div>
</div>
<div style="width: 60%;padding-right: 0px;
    padding-left: 0px;
    margin-right: auto;
    margin-left: auto;border-radius: 5px; background-color: white; padding-bottom: 20px; border: 3px solid #c29a5c">
    <div style="background-color: #333;">
    <h1 style="padding-top: 20px;padding-bottom: 30px; color: antiquewhite;" class="center">MUDANÇA DE SENHA</h1>
    </div>
<div class="container">
<form action="{{route('admin.atualizasenha',$registro->id)}}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('forms.seguranca._formsenha')


    <div style="padding-top: 30px; padding-bottom: 20px;" class="center">
        <button class="btn btn-color3">Salvar</button>
    </div>

</form>
</div>
</div>
@endsection
