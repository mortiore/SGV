@extends ('layout.site')

@section('titulo','Produtos Cadastrados')

@section('conteudo')

<div style="background-color: #314153; padding: 0px 120px 0px 120px;">

    <h1 style="padding-top: 20px; padding-bottom: 40px; color: #c29a5c;" class="center">Produtos Cadastrados</h1>
    <div class="">
        <div class="center" style="padding-bottom: 30px;">
        <button class="btn bu2"><span><a style="color: black; text-decoration: none;" href="{{route('admin.produto.cadastraproduto')}}">Cadastrar Produto</a></span></button>
        </div>
        <table class="table table-bordered" style="background-color: white; border:3px solid #c29a5c !important; border-color: #c29a5c !important;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Em estoque</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                <tr>
                    <td>{{ $registro->idProduto }}</td>
                    <td>{{ $registro->nome }}</td>
                    <td>{{ $registro->descricao }}</td>
                    <td>R$ {{ $registro->valor }}</td>
                    <td>{{ $registro->numEstoque }}</td>
                    <td>
                        <a class="btn bu" href="*">Editar</a>
                        <a class="btn bu1" href="*">Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="padding-bottom: 60px;"></div>
</div>
@endsection
