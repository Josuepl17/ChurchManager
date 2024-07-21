@extends('components.layout')
@section('aba-navegador', 'Lista Presença' )
@section('titulo-pagina', 'Lista Presença' )



@section('botao-tabela')
<a href="/cadastro/membro"><button style="padding: 5px;">Inserir</button></a>

<form action="/" method="get">
    <input type="search" name="pesquisa" value="{{ isset($dados) ? $dados : '' }}">
    <input type="submit" value="Buscar">
</form>

@endsection


@section('conteudo')












@endsection