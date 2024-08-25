@extends('components.layout')
@section('aba-navegador', 'Ofertas' )
@section('titulo-pagina', 'Ofertas' )




@section('botao-tabela')
<form action="/filtrar/ofertas" method="get">
    <input type="date" name="dataini" id="dataini" value="{{Session()->get('dataini')}}" required>
    <input type="date" name="datafi" id="datafi" value="{{Session()->get('datafi')}}" required>
    <input style="width: 65px;" type="submit" value="Filtrar">
</form>
@endsection



@section('conteudo')
<div id="tabela-dados">
    <table>
        <tr>
            <th style="width: 4%;">ID</th>
            <th>DATA</th>
            <th>VALOR</th>
            <th style="width: 4%;">X</th>
        </tr>
        @foreach ($ofertas->reverse() as $oferta)
        <tr>
            <td style="background-color: var(--titulos) ; color:white">{{ $oferta->id}}</td>
            <td>{{\Carbon\Carbon::parse($oferta->data)->format('d/m/Y')}}</td>
            <td>R$ {{ number_format($oferta->valor, 2, ',', '.') }}</td>
            <td id="X">
                <form method="post" action="/destroy/ofertas/id"><button>X</button>
                    <input type="hidden" name="data" value="{{$oferta->data}}">
                    <input type="hidden" name="id" value="{{$oferta->id}}">
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
    <p style="color: green;  font-weight: bold;">{{ number_format($totalofertas, 2, ',', '.') }}</p>
    </p>
</div>


<div id="formulario-registro">
    <form action="/registrar/oferta" method="post">
        @csrf
        <input type="date" name="data" id="data" value="{{ $datanow }}" autocomplete="off" required>
        <input type="number" step="0.01" name="valor" id="valor" autocomplete="off" required placeholder="Valor">
        <input type="hidden" name="dataini" value="{{Session()->get('dataini')}}">
        <input type="hidden" name="datafi" value="{{Session()->get('datafi')}}">
        <button type="submit">Registar Oferta</button>
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
            const links = document.querySelectorAll('.links-2');
            links.forEach(link => {
                link.style.backgroundColor = 'rgb(228, 228, 228)';
                link.style.color = 'black';
            });
        });
    </script>


@endsection
