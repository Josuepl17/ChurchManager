@extends('components.layout')


@section('titulo', $razao_empresa )
@section('titulo-nav', $razao_empresa )
<style>
    :root {
        --titulos: #0A1626;
        --subtitulos: #023859;
        --fundos: #0D8AA6;

        --cor-secundaria: #313131e7;
    }
</style>

@section('botao-tabela')

<a href="/cadastro/membro"><button>Cadastrar Membro</button></a>
<form id="nav" action="/" method="get">
    <input type="search" name="pesquisa" id="pesquisa" value="{{ isset($dados) ? $dados : '' }}">
    <input type="submit" value="Buscar">
</form>

@endsection

@section('conteudo')

<div class="conteudo">
    <table>
        <tr>
            <th class="sumir">ID</th>
            <th style="width: 20%;">NOME</th>
            <th class="sumir">ENDEREÇO</th>
            <th>FUNÇÃO</th>
            <th>TELEFONE</th>
            <th class="sumir" style="width: 08%;">X</th>
            <th style="width: 4%;">X</th>
        </tr>
        @foreach ($index as $ind)
        <tr>
            <td class="sumir" style="background-color:#0A1626 ; color:white">{{ $ind->id }}</td>
            <td>{{ $ind->nome }}</td>
            <td class="sumir">{{ $ind->endereco }}</td>
            <td>{{ $ind->funcao }}</td>
            <td>{{ $ind->telefone }}</td>
            <td class="sumir">
                <form class="formx" action="/inserir/dizimos/{{ $ind->id }}/{{ $ind->nome }}"><button class="inserir">Inserir</button></form>
            </td>
            <td>
                <form action="/destroy/{{$ind->id}}" method="post"><button class="excluir">X</button>
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </table>


</div>

<div class="barra">

</div>



@endsection