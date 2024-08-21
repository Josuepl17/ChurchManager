@extends('components.layout')
@section('aba-navegador', 'Despesas' )
@section('titulo-pagina', 'Despesas' )



<link href="{{ asset('css/oferta-dizimo-despesas.css') }}" rel="stylesheet">

@section('botao-tabela')
<form action="/filtrar/despesas" method="post">
    @csrf
    <input  type="date" name="dataini" id="dataini" value="{{Session()->get('dataini')}}" required>

    <input  type="date" name="datafi" id="datafi" value="{{Session()->get('datafi')}}" required>
    <input style="width: 65px;" type="submit" value="Filtrar">
</form>
@endsection




@section('conteudo')
<div id="tabela-dados">
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
            <td id="X">
                <form method="POST" class="formx" action="/destroy/despesas/id"><button>X</button>
                    <input type="hidden" name="data" value="{{$despesa->data}}">
                    <input type="hidden" name="id" value="{{$despesa->id}}">
                    <input type="hidden" name="dataini" value="{{Session()->get('dataini')}}">
                    <input type="hidden" name="datafi" value="{{Session()->get('datafi')}}">
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





<div id="formulario-registro">
    <form class="id" action="/registrar/despesas/igreja" method="post">
        @csrf
        <input class="cad" type="date" name="data" id="data" value="{{$datanow}}" autocomplete="off" required>

        <input type="text" list="descricao" name="descricao" placeholder="Descrição" required>
        <datalist id="descricao">
            @foreach ($descricao as $desc)
            <option value="{{$desc->descricao_despesas}}">
            @endforeach
        </datalist  >


        <input type="number" name="valor" step="0.01" id="valor" autocomplete="off" required placeholder="Valor">

        <input type="hidden" name="dataini" value="{{Session()->get('dataini')}}">
        <input type="hidden" name="datafi" value="{{Session()->get('datafi')}}">

        <button type="submit">Registar Despesa</button>
    </form>
</div>



@if (Session::has('sucesso'))
<div class="flash-message" style="background-color: rgb(0, 77, 0);">
    <p>{{ Session::get('sucesso') }}</p>
</div>
{{ Session::forget('sucesso') }}
@endif

@if (Session::has('falha'))
<div class="flash-message" style="background-color: red;">
    <p>{{ Session::get('falha') }}</p>
</div>
{{ Session::forget('falha') }}
@endif 

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.links-3');
            links.forEach(link => {
                link.style.backgroundColor = 'rgb(228, 228, 228)';
                link.style.color = 'black';
            });
        });
    </script>

    

@endsection