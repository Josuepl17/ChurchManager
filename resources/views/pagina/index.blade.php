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


    .conteudo {
        
        width: 100%; 
        border-collapse: collapse;
    }

    .conteudo th, .conteudo td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .conteudo th{
        background-color: var(--titulos);
        color: white;
    }




   
</style>

@section('botao-tabela')

<a href="/cadastro/membro"><button style="padding: 4px;" >Cadastrar Membro</button></a>
<form id="nav" action="/" method="get">
    <input type="search" name="pesquisa" id="pesquisa" value="{{ isset($dados) ? $dados : '' }}">
    <input type="submit" value="Buscar">
</form>

@endsection

@section('conteudo')


    <table class="conteudo" >
        <tr>
            <th>ID</th>
            <th style="width: 20%;">NOME</th>
            <th>ENDEREÇO</th>
            <th>FUNÇÃO</th>
            <th>TELEFONE</th>
            <th  style="width: 08%;">X</th>
            <th style="width: 4%;">X</th>
        </tr>
        @foreach ($index as $ind)
        <tr>
            <td  style="background-color:#0A1626 ; color:white">{{ $ind->id }}</td>
            <td>{{ $ind->nome }}</td>
            <td >{{ $ind->endereco }}</td>
            <td>{{ $ind->funcao }}</td>
            <td>{{ $ind->telefone }}</td>
            <td style="background-color: green;" >
                <a style="color: white; font-size:15px; text-decoration: none;" href="/inserir/dizimos/{{ $ind->id }}/{{ $ind->nome }}">Inserir</a>
            </td>
            <td style="background-color: red;" >

                <a style="color: white; font-size:15px; text-decoration: none;" href="/destroy/{{$ind->id}}">X</a>
            </td>
        </tr>
        @endforeach
    </table>
    


@endsection