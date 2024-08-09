@extends('components.layout')
@section('conteudo')
@section('aba-navegador', 'DIZIMOS' )
@section('titulo-pagina', 'Dizimos do ' . session()->get('nome'))





@section('botao-tabela')
<form action="/inserir/dizimos" method="post">
@csrf   
    <input type="hidden" name="membro_id" value="{{Session()->get('membro_id')}}">
    <input type="hidden" name="nome" value="{{Session()->get('nome')}}">
    <input type="date" name="dataini" id="dataini" value="{{Session()->get('dataini_d')}}" required>
    <input type="date" name="datafi" id="datafi" value="{{Session()->get('datafi_d')}}" required>
    <input style="width: 65px;" type="submit" value="Filtrar">
</form>
@endsection



@section('conteudo')
<div id="tabela-dados">
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
            <td id="X">
                <form method="post"  action="/dizimos/destoy/id">
                    <button class="excluir">X</button>
                    <input type="hidden" name="data" value="{{$dizimo->data}}">
                    <input type="hidden" name="id" value="{{$dizimo->id}}">
                    @csrf
                </form>
            </td>
        </tr>

        @endforeach
    </table>
</div> <!--tabela-dados-->



<div id="valor-total">
    <p>VALOR TOTAL: R$
    <p style="color: green; font-weight: bold;">{{ number_format($totaldizimos, 2, ',', '.') }}</p>
    </p>
</div> <!--valor-total-->




<div id="formulario-registro">
    <form action="/registrar/dizimo" method="post">
        @csrf
        <input type="hidden" name="membro_id" value="{{Session()->get('membro_id')}}">
        <input type="hidden" name="nome" value="{{Session()->get('nome')}}">
        <input type="date" name="data" id="data" value="{{$datanow}}" autocomplete="off" required>
        <input type="number" name="valor" step="0.01" id="valor" autocomplete="off" required placeholder="Valor:">
        <input type="hidden" name="dataini" value="{{Session()->get('dataini_d')}}">
        <input type="hidden" name="datafi" value="{{Session()->get('datafi_d')}}">
        <button type="submit">Registar Dizimo</button>
    </form>
</div> <!--formulario-registro-->



@if (Session::has('sucesso'))
<div class="flash-message" style="background-color: rgb(0, 77, 0);" class="msg">
    <p>{{ Session::get('sucesso') }}</p>
</div>
{{ Session::forget('sucesso') }}
@endif

@if (Session::has('falha'))
<div class="flash-message" style="background-color: red;" class="msg">
    <p>{{ Session::get('falha') }}</p>
</div>
{{ Session::forget('falha') }}
@endif

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.links-1');
            links.forEach(link => {
                link.style.backgroundColor = 'rgb(228, 228, 228)';
                link.style.color = 'black';
            });
        });
    </script>

@endsection