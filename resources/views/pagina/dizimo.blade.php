@extends('components.layout')
@section('conteudo')
@section('titulo', $nome)
@section('titulo-nav', $nome)


<style>
:root {
        --titulos: #0A1626;
        --subtitulos: #023859;
        --fundos: #0D8AA6;
        --cor-secundaria: #313131e7;
    }

    .table2 {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 80%;



    }

    .id {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 15px;





    }

    label {
        font-size: 20px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        padding: 10px;

    }



    .cad {
        width: 30%;
        text-transform: uppercase;
        font-size: 20px;
        padding: 2px;
        border: 1px solid black;
        text-align: center;


    }

    .h1m {
        color: black;
        font-size: 50px;
    }

    .id button {
        margin: 0px;
        color: black;
        text-decoration: none;

        padding-bottom: 0;
        font-size: 20px;
        width: 180px;
        height: 40px;
        border: 3px solid black;
        background-color: var(--subtitulos);
        color: white;


    }

    .id button:hover {
        background-color: var(--titulos);
        color: white;

        transition: 0.6s;

    }

    .excluir {
        margin: auto;
        background-color: red;
        font-size: 20px;
        height: 100%;
        width: 100%;
        margin-top: -2px;


    }


    .excluir:hover {
        color: aliceblue;

        background-color: red;
        transition: 0.6;
    }

    table {
        border-collapse: collapse;



        margin: auto;
        border-radius: 50px;
        width: 100%;
        background-color: white;
        margin-top: 0px;
        color: black;

    }

    td {

        border: 1px solid rgba(0, 0, 0, 0.34);
        text-align: center;
        font-size: 18px;
        margin-top: 0px;
        margin-bottom: 0px;
    }


    td:hover {
        color: white;
    }




    th {
        border: 1px solid black;
        border-top: none;
        border-left: none;

        font-size: 20px;
        color: white;
        background-color: var(--subtitulos);
        position: sticky;
        top: -1px;
        padding-top: 5px;

    }

    tr:hover {
        background-color: var(--fundos);
        color: white;
        transition: 0.1s;
    }



    .formx {

        display: flex;
        width: 100%;
        flex-direction: none;
        align-items: none;
        margin-top: none;
        justify-content: none;



    }

    .valortotal {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        height: 9%;
        width: 100%;
        background-color: var(--titulos);

    }

    .valortotal p {
        color: black;
        padding-right: 10px;
        background-color: white;



    }

    .filtro {
        display: flex;
        width: 100%;
        background-color: var(--titulos);
        padding-top: 5px;
        padding-bottom: 5px;
        height: 7%;
    }

    .filtro form {
        width: 100%;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        border-radius: 0px;
        margin-top: -3px;

    }

    .conteudo {
        display: flex;
        width: 100%;
        height: 100%;
        overflow: auto;
    }

    .msg {
        position: absolute;
        z-index: 999;
        right: 25px;
        top: 16px;
        border: 1px solid black;
        width: 350px;
        height: 40px;
        
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        animation: sumir 6s forwards;
        border-radius: 0px 20px 0px 20px;
    }

    @keyframes sumir {
            to {
                opacity: 0;
                /* torna o elemento transparente */
                visibility: hidden;
                /* oculta o elemento da tela */
            }
        }
</style>




<div class="table2">
    <div class="filtro">
        <form action="/filtrar/dizimo/{{ $usuario_id }}/{{ $nome }}" method="get">
            <input type="date" name="dataini" id="dataini" value="{{ isset($dataini) ? $dataini : '' }}" required>
            <input type="date" name="datafi" id="datafi" value="{{ isset($datafi) ? $datafi : '' }}" required>
            <input type="submit" value="Filtrar" style="width: 5%; font-size: 15px; border-radius: 0px;">
        </form>
    </div>

    <div class="conteudo">


        <table>
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
                        <input type="hidden" name="usuario_id" value="{{$dizimo->usuario_id}}">
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

    <div class="valortotal">
        <p>VALOR TOTAL: R$
        <p style="color: green; font-weight: bold;">{{ number_format($totaldizimos, 2, ',', '.') }}</p>
        </p>
    </div>


</div>


<form class="id" action="/registrar/dizimo" method="post">
    @csrf
    <input type="hidden" name="usuario_id" value="{{ $usuario_id}}">
    <input type="hidden" name="nome" value="{{ $nome }}">
    <label for="data">Data:</label>
    <input class="cad" type="date" name="data" id="data" value="{{$datanow}}" autocomplete="off" required>

    <label for="valor">Valor:</label>
    <input class="cad" type="text" name="valor" id="valor" autocomplete="off" required>
    <input type="hidden" name="dataini" value="{{ isset($dataini) ? $dataini : '' }}">
    <input type="hidden" name="datafi" value="{{ isset($datafi) ? $datafi : '' }}">


    <br>

    <button type="submit">Registar Dizimo</button>
</form>

@if (Session::has('sucesso'))
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
@endif



@endsection