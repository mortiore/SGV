@extends ('layout.siteinterno')

@section('titulo','Produtos Cadastrados')

@section('conteudo')

<div style="background-color: #314153;">

    <h1 style="padding-top: 20px; padding-bottom: 40px; color: #c29a5c;" class="center">Produtos Cadastrados</h1>
    <div class="">
        <div class="center" style="padding-bottom: 30px;">
        <button class="btn btn-color3"><span><a style="color: black; text-decoration: none;" href="{{route('admin.produto.cadastraproduto')}}">Cadastrar Produto</a></span></button>
        </div>
        <table class="table table-bordered" style="width: 70%;padding-right: 0px;
    padding-left: 0px;
    margin-right: auto;
    margin-left: auto;background-color: white; border:3px solid #c29a5c !important; border-color: #c29a5c !important;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                <tr>
                    <td>{{ $registro->id }}</td>
                    <td class="center"><img width="auto" height="180" src="{{asset($registro->imagem)}}" alt="{{ $registro->titulo }}"></td>
                    <td>{{ $registro->nome }}</td>
                    <td>{{ $registro->descricao }}</td>
                    <td>R$ {{ $registro->valor }}</td>
                    <td>
                        <a class="btn btn-green" href="{{ route('admin.produto.editaproduto',$registro->id) }}">Editar</a>
                        <a class="btn btn-danger" onclick="return confirm('Você realmente quer excluir {{ $registro->nome }} ?')" href="{{ route('admin.produto.deletaproduto',$registro->id) }}">Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="padding-bottom: 60px;"></div>
</div>
@endsection
