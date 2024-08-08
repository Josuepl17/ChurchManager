@extends('components.layout')
@section('aba-navegador', 'Lista Presença' )
@section('titulo-pagina', 'Lista Presença' )



@section('botao-tabela')
<a href="/lista/presencas"><button style="padding: 5px;">Inserir</button></a>

<form action="/" method="get">
    <input type="search" name="pesquisa" value="{{ isset($dados) ? $dados : '' }}">
    <input type="submit" value="Buscar">
</form>

@endsection


@section('conteudo')
<div id="tabela-dados">
    <table>
        <tr>
            <th style="width: 4%;">ID</th>
            <th>DATA</th>
            <th>EVENTO</th>
            <th>PRESENTES</th>
            <th>FALTANTES</th>
            
        </tr>
 
        <tr>
            <td style="background-color: var(--titulos); color:white"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </td>
        </tr>

    </table>
</div>












@endsection