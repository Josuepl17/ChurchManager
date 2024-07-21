@extends('components.layout')
@section('aba-navegador', 'Lista Presença' )
@section('titulo-pagina', 'Lista Presença' )



@section('botao-tabela')

@endsection


@section('conteudo')

<form @action="" method="post">
<input type="text" name="evento" id="evento">
<input type="datetime" name="data" id="data">

@foreach ($membros as $membro)

<label for="membro">{{membro}}</label>
<input type="checkbox" name="{{membro->id}}" id="{{membro->id}}" value="S">
<input type="checkbox" name="{{membro->id}}" id="{{membro->id}}" value="N">

@endforeach
</form>










@endsection