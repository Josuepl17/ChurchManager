@extends('components.layout')
@section('aba-navegador', 'Membros' )
@section('titulo-pagina', 'Membros' )

<style>
    input[type=search] {
        width: 100%;
        /* Para o Input diminuir no momento em que a tela o espremer*/
    }
</style>

@section('botao-tabela')
<a href="/cadastro/membro"><button style="padding: 5px;">Inserir</button></a>

<form action="/" method="get">
    <input type="search" name="pesquisa" value="{{ isset($dados) ? $dados : '' }}">
    <input type="submit" value="Buscar">
</form>
@endsection



@section('conteudo')

<table> <!-- Tabela Não necessita de Div pois so Existe ela dentro do #conteudo do Layout -->
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
        <td style="background-color: green;">
            <a style="color: white; text-decoration: none;" href="/inserir/dizimos/{{ $ind->id }}/{{ $ind->nome }}">Inserir</a>
        </td>
        <td style="background-color: red;">
            <a style="color: white; text-decoration: none;" href="/destroy/{{$ind->id}}">X</a>
        </td>
    </tr>
    @endforeach
</table>

@endsection