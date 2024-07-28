@extends('components.layout')
@section('aba-navegador', 'Lista Presença' )
@section('titulo-pagina', 'Lista Presença' )

<style>
    #header{
        display: flex;
        justify-content: center;
        height: 05%;
        width: 100%;
        margin-top: 20px;
    }


</style>

@section('botao-tabela')

@endsection


@section('conteudo')

<form action="/presenca" method="post">
<div id="header" style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
    <input type="text" name="evento" id="evento" placeholder="Evento" style="width: 300px; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    <input type="date" name="data" id="data" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    <input type="submit" value="Enviar" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
</div>

<div id="tabela-dados" style="width: 45%; overflow-x: auto; margin-top: 20px; margin:auto; height: 75%;" >
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="position: sticky;
    top: -1; z-index:999;" >
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">NOME</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">PRESENÇA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($membros as $membro)
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">{{$membro->nome}} {{$membro->sobrenome}}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">
                    <input type="checkbox" name="presenca[{{$membro->id}}]" id="presenca_{{$membro->id}}" value="P">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @csrf

</div>
<div style="margin-top: 20px;">
        
    </div>

@endsection