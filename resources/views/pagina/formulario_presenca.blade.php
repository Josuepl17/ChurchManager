@extends('components.layout')
@section('aba-navegador', 'Lista Presença' )
@section('titulo-pagina', 'Lista Presença' )

<style>
    #header{
        display: flex;
        justify-content: center;
        height: 05%;
        width: 100%;
        margin: 15px;
    }
</style>

@section('botao-tabela')

@endsection


@section('conteudo')

<form @action="" method="post">
<div id="header" >
    <input type="text" name="evento" id="evento" placeholder="Evento" style="width: 300px;">
    <input type= "date" name="data" id="data" >
</div>

<div id="tabela-dados" style="width: 400px;" >
    <table>
        <tr>
            <th >NOME</th>
            <th  >PRESENÇA</th>
           
        </tr>
        @foreach ($membros as $membro)
        <tr>
            <td >{{$membro->nome}}  {{$membro->sobrenome}}</td>
            <td ><input type="checkbox" name="{{$membro->id}}" id="{{$membro->id}}" value="P">
            </td>
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
        <input type="submit" value="Enviar">
    </table>
</div>


@endsection