@extends('components.layout')

@section('conteudo')
@section('titulo', 'DESPESAS' )
@section('titulo-nav', 'Despesas' )


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
        height: 90%;





    }

    .id {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 08%;
        margin-top: 05px;





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


        overflow: auto;
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
        top: 0px;
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
        height: 450px;
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

    .altura {
        height: 100%;
    }
</style>


<div class="table2">

    <div class="filtro">
        <form action="/filtrar/despesas" method="post">
            @csrf
            <input class="altura" type="date" name="dataini" id="dataini" value="{{ isset($dataini) ? $dataini : '' }}" required>

            <input class="altura" type="date" name="datafi" id="datafi" value="{{ isset($datafi) ? $datafi : '' }}" required>
            <input class="altura" type="submit" value="Filtrar" style="width: 5%; font-size: 15px; border-radius: 0px; ">
        </form>
    </div>

    <div class="conteudo">
        <table>
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
                <td>
                    <form method="POST" class="formx" action="/destroy/despesas/id"><button class="excluir">X</button>
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

    <div class="valortotal">
        <p>VALOR TOTAL: R$
        <p style="color: red;  font-weight: bold;">{{ number_format($totaldespesas, 2, ',', '.') }}</p>
        </p>
    </div>


</div>




<form class="id" action="/registrar/despesas/igreja" method="post">
    @csrf

    <label for="data">Data:</label>
    <input class="cad" type="date" name="data" id="data" value="{{$datanow}}" autocomplete="off" required>

    <label for="descricao">Desc:</label require>
    <input type="text" list="descricao" name="descricao">
    <datalist id="descricao">
        <option value="Oferta Pastor">
        <option value="Pregador">
        <option value="Cozinha">
        <option value="Crianças">
    </datalist>





    <label for="valor">Valor:</label>
    <input style="width: 10%;" class="cad" type="text" name="valor" id="valor" autocomplete="off" required>

    <br>

    <input type="hidden" name="dataini" value="{{ isset($dataini) ? $dataini : '' }}">
    <input type="hidden" name="datafi" value="{{ isset($datafi) ? $datafi : '' }}">

    <button type="submit">Registar Despesa</button>
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