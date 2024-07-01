@extends('components.layout')

@section('conteudo')
@section('titulo', 'DIZIMOS' )
@section('titulo-nav', 'Dizimos' )


<style>
:root {
        --titulos: #0A1626;
        --subtitulos: #023859;
        --fundos: #0D8AA6;

        --cor-secundaria: #313131e7;
    }

    .conteudo {
        font-size: 14px;
        width: 100%; 
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

    .conteudo tr:first-child{
        position: sticky;
        top: 0;

    }

    #conteudo2{
        width: 100%;
        height: 75%;
        overflow: auto;
    }

    #valor-total{
        display: flex;
        width: 100%;
        background-color: var(--titulos);
        color: white;
        justify-content: flex-end;
        align-items: center;
        height: 5%;
    }

    #formulario-registro{
        display: flex;
        width: 100%;
        background-color: white;
        justify-content: center;
        align-items: center;
        height: 20%;
        flex-wrap: wrap;
    }

    #formulario-registro label, #formulario-registro label, #formulario-registro input, #formulario-registro button{
       padding: 10px;
    }

    #valor-total p {
        margin-right: 10px;
    }
</style>




@section('botao-tabela')
        <form action="/filtrar/dizimo/{{ $membro_id }}/{{ $nome }}" method="get">
            <input class="altura" type="date" name="dataini" id="dataini" value="{{ isset($dataini) ? $dataini : '' }}" required>
            <input class="altura" type="date" name="datafi" id="datafi" value="{{ isset($datafi) ? $datafi : '' }}" required>
            <input class="altura" type="submit" value="Filtrar">
        </form>
@endsection

  

@section('conteudo')
<div id="conteudo2">
        <table class="conteudo" >
            <tr>
                <th style="width: 4%; ">ID</th>
                <th>DATA</th>
                <th>VALOR</th>
                <th style="width: 4%;">X</th>
            </tr>
            @foreach ($dizimos->reverse() as $dizimo)

            <tr>
                <td style="background-color: var(--titulos);; color:white">{{ $dizimo->id}}</td>
                <td>{{ \Carbon\Carbon::parse($dizimo->data)->format('d/m/Y') }}</td>
                <td>R${{ number_format($dizimo->valor, 2, ',', '.') }}</td>
                <td>
                    <form method="post" class="formx" action="/dizimos/destoy/id"><button class="excluir">X</button>
                        <input type="hidden" name="data" value="{{$dizimo->data}}">
                        <input type="hidden" name="id" value="{{$dizimo->id}}">
                        <input type="hidden" name="membro_id" value="{{$dizimo->membro_id}}">
                        <input type="hidden" name="dataini" value="{{ isset($dataini) ? $dataini : '' }}">
                        <input type="hidden" name="datafi" value="{{ isset($datafi) ? $datafi : '' }}">
                        <input type="hidden" name="nome" value="{{ $nome }}">

                        @csrf
                    </form>
                </td>
            </tr>

            @endforeach
        </table>
</div>

    <div id="valor-total">
        <p>VALOR TOTAL: R$
        <p style="color: green; font-weight: bold;">{{ number_format($totaldizimos, 2, ',', '.') }}</p>
        </p>
    </div>




<div id="formulario-registro" >
<form action="/registrar/dizimo" method="post">
    @csrf
    <input type="hidden" name="membro_id" value="{{ $membro_id}}">
    <input type="hidden" name="nome" value="{{ $nome }}">
    <input  type="date" name="data" id="data" value="{{$datanow}}" autocomplete="off" required>

    
    <input  type="number" name="valor" id="valor" autocomplete="off" required placeholder="Valor:" >
    <input type="hidden" name="dataini" value="{{ isset($dataini) ? $dataini : '' }}">
    <input type="hidden" name="datafi" value="{{ isset($datafi) ? $datafi : '' }}">
    <button type="submit">Registar Dizimo</button>
</form>
</div>
@endsection

<!--@if (Session::has('sucesso'))
    <div style="background-color: green;" class="msg">
        <p>{{ Session::get('sucesso') }}</p>
    </div>
    {{ Session::forget('sucesso') }}
@endif

@if (Session::has('falha'))
    <div style="background-color: red;" class="msg">
        <p>{{ Session::get('falha') }}</p>
    </div>
    {{ Session::forget('falha') }}
@endif -->



