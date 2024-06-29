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
        
        width: 1125px; 
        border-collapse: collapse;
        background-color: white;
    }

    .conteudo th, .conteudo td {
        padding: 5px;
        
        border: 1px solid #ddd;
        text-align: center;
    }



    .conteudo th{
        background-color: var(--titulos);
        color: white;
    }

    .conteudo tr{
        height: 1px;
    }

    @media (max-width: 1300px) {
           .menor{
            width: 90%;
        }

        form{
            width: 60%;
        }

        .conteudo{
            width: 1250px;
        }

    }




   
</style>

@section('botao-tabela')

<a href="/cadastro/membro"><button style="padding: 4px;" >Cadastrar Membro</button></a>
<form action="/" method="get">
    <input class="menor"  type="search" name="pesquisa" value="{{ isset($dados) ? $dados : '' }}">
    <input  type="submit" value="Buscar">
</form>

@endsection

@section('conteudo')


    <table class="conteudo" >
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>ENDEREÇO</th>
            <th>FUNÇÃO</th>
            <th>TELEFONE</th>
            <th  >X</th>
            <th >X</th>
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