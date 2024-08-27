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

@endsection


@section('conteudo')
<livewire:Results/>
@endsection
