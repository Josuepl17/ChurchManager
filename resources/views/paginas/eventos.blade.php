@extends('components.layout')
@section('aba-navegador', 'Lista Presença' )
@section('titulo-pagina', 'Lista Presença' )



@section('botao-tabela')
<a href="/lista/presencas"><button style="padding: 5px;">Inserir</button></a>


@endsection


@section('conteudo')
<div id="tabela-dados">
    <table>
        <tr>
            <th style="width: 4%;">ID</th>
            <th>DATA</th>
            <th>EVENTO</th>
            <th>PRESENTES</th>
            <th>FALTANTES</th>
            
        </tr>
        @foreach ($eventos as $evento)
        <tr>
            <td style="background-color: var(--titulos); color:white">{{$evento->id}}</td>
            <td>{{\Carbon\Carbon::parse($evento->data)->format('d/m/Y')}}</td>
            <td>{{$evento->evento}}</td>
            <td>{{$evento->presentes}}</td>
            <td>{{$evento->faltantes}}</td>
            </td>
        </tr>
            @endforeach
    </table>
</div>




<script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.links-8');
            links.forEach(link => {
                link.style.backgroundColor = 'rgb(228, 228, 228)';
                link.style.color = 'black';
            });
        });
    </script>







@endsection