@extends('components.layout')
@section('aba-navegador', 'Membros' )
@section('titulo-pagina', 'Membros' )

<style>
    input[type=search] {
        width: 100%;
        /* Para o Input diminuir no momento em que a tela o espremer*/

    }

    #inserir-verde input[type=submit] {

        all: unset;

    }




    * {
        box-sizing: border-box;

    }
</style>

@section('botao-tabela')
@livewire('busca-membros')

<<<<<<< HEAD
=======
<form action="/" method="get">
    <input type="search" name="pesquisa" value="{{ isset($dados) ? $dados : '' }}">
    <input type="submit" value="Buscar">
</form>
>>>>>>> parent of 7a8f3ab (top)
@endsection


@section('conteudo')
<livewire:Results/>
@endsection
