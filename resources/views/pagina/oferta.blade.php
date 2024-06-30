@extends('components.layout')

@section('conteudo')
@section('titulo', 'OFERTAS' )
@section('titulo-nav', 'Ofertas' )


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
        height: 85%;
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
        height: 10%;
    }

    #formulario-registro label, #formulario-registro label, #formulario-registro input, #formulario-registro button{
       padding: 6px;
    }


</style>


@section('botao-tabela')
        <form action="/filtrar/ofertas" method="get">
            <input  type="date" name="dataini" id="dataini" value="{{ isset($dataini) ? $dataini : '' }}" required>
            <input  type="date" name="datafi" id="datafi" value="{{ isset($dataini) ? $dataini : '' }}" required>
            <input  type="submit" value="Filtrar">
        </form>
@endsection



@section('conteudo')
        <div id="conteudo2">
            <table class="conteudo">
                <tr>
                    <th style="width: 4%;">X</th>
                    <th>DATA</th>
                    <th>VALOR</th>
                    <th style="width: 4%;">X</th>
                </tr>
                @foreach ($ofertas->reverse() as $oferta)
                <tr>
                    <td style="background-color: var(--titulos) ; color:white">{{ $oferta->id}}</td>
                    <td>{{\Carbon\Carbon::parse($oferta->data)->format('d/m/Y')}}</td>
                    <td>R$ {{ number_format($oferta->valor, 2, ',', '.') }}</td>
                    <td>
                        <form method="post"  action="/destroy/ofertas/id"><button>X</button>
                            <input type="hidden" name="data" value="{{$oferta->data}}">
                            <input type="hidden" name="id" value="{{$oferta->id}}">
                            <input type="hidden" name="dataini" value="{{ isset($dataini) ? $dataini : '' }}">
                            <input type="hidden" name="datafi" value="{{ isset($datafi) ? $datafi : '' }}">
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>







    <div id="valor-total" >
        <p>VALOR TOTAL: R$
        <p >{{ number_format($totalofertas, 2, ',', '.') }}</p>
        </p>
    </div>


<div id="formulario-registro" >
    <form  action="/registrar/oferta" method="post">
        @csrf
        <label for="data">Data:</label>
        <input  type="date" name="data" id="data" value="{{ $datanow }}" autocomplete="off" required>
    
        <label for="valor">Valor:</label>
        <input  type="text" name="valor" id="valor" autocomplete="off" required>
        <input type="hidden" name="dataini" value="{{ isset($dataini) ? $dataini : '' }}">
        <input type="hidden" name="datafi" value="{{ isset($datafi) ? $datafi : '' }}">
        <button type="submit">Registar Oferta</button>
    </form>
</div>



<!--@if (Session::has('sucesso'))
    <div style="background-color: green;" >
        <p>{{ Session::get('sucesso') }}</p>
    </div>
    {{ Session::forget('sucesso') }}
@endif

@if (Session::has('falha'))
    <div style="background-color: red;" >
        <p>{{ Session::get('falha') }}</p>
    </div>
    {{ Session::forget('falha') }}
@endif -->


@endsection