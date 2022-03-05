@extends ('layout.site')

@section('titulo','Fornecedores Cadastrados')

@section('conteudo')
<style>

.bu{
    background-color: #1fc600;
}
.bu:hover{
    background-color: #089000;
    color: antiquewhite;
}
.bu1{
    background-color: #FF0000;
}
.bu1:hover{
    background-color: #BF0000;
    color: antiquewhite;
}
.bu2{
    background-color: #c29a5c;
}
.bu2:hover{
    background-color: rgba(194, 154, 92, .7);
}
th{
        background: #333;
        color: white;
        font-weight: bold;
    }

</style>
<div style="background-color: #314153; padding: 0px 120px 0px 120px;">

    <h1 style="padding-top: 20px; padding-bottom: 40px; color: #c29a5c;" class="center">Fornecedores</h1>
    <div class="">
        <div class="center" style="padding-bottom: 30px;">
        <button class="btn bu2"><span><a style="color: black; text-decoration: none;" href="*">Cadastrar Fornecedor</a></span></button>
        </div>
        <table class="table table-bordered" style="background-color: white; border:3px solid #c29a5c !important; border-color: #c29a5c !important;">
        <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Rua</th>
                        <th>Nº</th>
                        <th>Bairro</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->idFornecedor }}</td>
                        <td>{{ $registro->nome }}</td>
                        <td>{{ $registro->telefone }}</td>
                        <td>{{ $registro->email }}</td>
                        <td>{{ $registro->rua }}</td>
                        <td>{{ $registro->numCasa }}</td>
                        <td>{{ $registro->bairro }}</td>
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
