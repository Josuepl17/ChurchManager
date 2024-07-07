@extends('components.layout')
@section('aba-navegador', 'Membros' )
@section('titulo-pagina', 'Membros' )

<style>
    :root {
        --titulos: #0A1626;
        --subtitulos: #023859;
        --fundos: #0D8AA6;

        --cor-secundaria: #313131e7;
    }




    @media (max-width: 1300px) {
        .menor {
            width: 90%;
        }

        #conteiner-subtable a {
            padding: 2px;
        }


    }

    td a {
        display: flex;
        justify-content: center;
        width: 100%;
        height: 100%;
    }

    td  a:active {
        transform: translateY(4px);

    }

    
</style>

@section('botao-tabela')

<a href="/cadastro/membro"><button style="padding: 4px;">Inserir</button></a>
<form action="/" method="get">
    <input class="menor" type="search" name="pesquisa" value="{{ isset($dados) ? $dados : '' }}">
    <input style="width: 65px;" type="submit" value="Buscar">
</form>

@endsection

@section('conteudo')


<table class="conteudo">
    <tr>
        <th class="remover">ID</th>
        <th>NOME</th>
        <th class="remover">ENDEREÇO</th>
        <th>FUNÇÃO</th>
        <th>TELEFONE</th>
        <th>X</th>
        <th>X</th>
    </tr>
    @foreach ($index as $ind)
    <tr>
        <td class="remover" style="background-color:#0A1626 ; color:white">{{ $ind->id }}</td>
        <td>{{ $ind->nome }}</td>
        <td class="remover">{{ $ind->endereco }}</td>
        <td>{{ $ind->funcao }}</td>
        <td>{{ $ind->telefone }}</td>
        <td class="mudar-cor-inserir" style="background-color: green;">
            <a  style="color: white; font-size:15px; text-decoration: none;" href="/inserir/dizimos/{{ $ind->id }}/{{ $ind->nome }}">Inserir</a>
        </td>
        <td class="mudar-cor-X" style="background-color: red;">
            <a style="color: white; font-size:15px; text-decoration: none;" href="/destroy/{{$ind->id}}">X</a>
        </td>
    </tr>
    @endforeach
</table>



@endsection