@extends('components.layout')
@section('conteudo')
@section('titulo', 'Despesas' )
@section('nome_igreja', 'Despesas' )


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

    td form button {
        all: unset;
        width: 100%;
        height: 100%;
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
        <form action="/filtrar/despesas" method="post">
            @csrf
            <input class="altura" type="date" name="dataini" id="dataini" value="{{ isset($dataini) ? $dataini : '' }}" required>

            <input class="altura" type="date" name="datafi" id="datafi" value="{{ isset($datafi) ? $datafi : '' }}" required>
            <input class="altura" type="submit" value="Filtrar" >
        </form>
@endsection




@section('conteudo')
        <div id="conteudo2">
        <table class="conteudo" >
            <tr>
                <th style="width: 4%;">ID</th>
                <th>DATA</th>
                <th>DESCRIÇÃO</th>
                <th>VALOR</th>
                <th style="width: 4%;">X</th>
            </tr>
            @foreach ($despesas->reverse() as $despesa)
            <tr>
                <td style="background-color: var(--titulos); color:white">{{$despesa->id}}</td>
                <td>{{\Carbon\Carbon::parse($despesa->data)->format('d/m/Y')}}</td>
                <td>{{$despesa->descricao}}</td>
                <td>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</td>
                <td style="background-color: red; color:white" >
                    <form method="POST" class="formx" action="/destroy/despesas/id"><button>X</button>
                        <input type="hidden" name="data" value="{{$despesa->data}}">
                        <input type="hidden" name="id" value="{{$despesa->id}}">
                        <input type="hidden" name="dataini" value="{{ isset($dataini) ? $dataini : '' }}">
                        <input type="hidden" name="datafi" value="{{ isset($datafi) ? $datafi : '' }}">
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
</div>



    <div id="valor-total">
        <p>VALOR TOTAL: R$
        <p style="color: red;  font-weight: bold;">{{ number_format($totaldespesas, 2, ',', '.') }}</p>
        </p>
    </div>





    <div id="formulario-registro" >
<form class="id" action="/registrar/despesas/igreja" method="post">
    @csrf
    <input class="cad" type="date" name="data" id="data" value="{{$datanow}}" autocomplete="off" required>

    <input type="text" list="descricao" name="descricao" placeholder="Descrição" >
    <datalist id="descricao">
        <option value="Oferta Pastor">
        <option value="Pregador">
        <option value="Cozinha">
        <option value="Crianças">
    </datalist>


    <input  type="number" name="valor" id="valor" autocomplete="off" required placeholder="Valor" >

    <input type="hidden" name="dataini" value="{{ isset($dataini) ? $dataini : '' }}">
    <input type="hidden" name="datafi" value="{{ isset($datafi) ? $datafi : '' }}">

    <button type="submit">Registar Despesa</button>
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








