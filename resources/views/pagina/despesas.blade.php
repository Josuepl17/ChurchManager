@extends('components.layout')
@section('aba-navegador', 'Despesas' )
@section('titulo-pagina', 'Despesas' )

<style>
#preloader {
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:#F27620; /* cor do background que vai ocupar o body */
    z-index:999; /* z-index para jogar para frente e sobrepor tudo */
}
#preloader .inner {
    position: absolute;
    top: 50%; /* centralizar a parte interna do preload (onde fica a animação)*/
    left: 50%;
    transform: translate(-50%, -50%);  
}
.bolas > div {
  display: inline-block;
  background-color: #fff;
  width: 25px;
  height: 25px;
  border-radius: 100%;
  margin: 3px;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  animation-name: animarBola;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
   
}
.bolas > div:nth-child(1) {
    animation-duration:0.75s ;
    animation-delay: 0;
}
.bolas > div:nth-child(2) {
    animation-duration: 0.75s ;
    animation-delay: 0.12s;
}
.bolas > div:nth-child(3) {
    animation-duration: 0.75s  ;
    animation-delay: 0.24s;
}
 
@keyframes animarBola {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  16% {
    -webkit-transform: scale(0.1);
    transform: scale(0.1);
    opacity: 0.7;
  }
  33% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1; 
  } 
}

</style>

<link href="{{ asset('css/oferta-dizimo-despesas.css') }}" rel="stylesheet">

@section('botao-tabela')
<form action="/filtrar/despesas" method="post">
    @csrf
    <input  type="date" name="dataini" id="dataini" value="{{Session()->get('dataini')}}" required>

    <input  type="date" name="datafi" id="datafi" value="{{Session()->get('datafi')}}" required>
    <input style="width: 65px;" type="submit" value="Filtrar">
</form>
@endsection


<div class="loader"></div>

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
            <option value="Oferta Pastor">
            <option value="Pregador">
            <option value="Cozinha">
            <option value="Crianças">
        </datalist>


        <input type="number" name="valor" step="0.01" id="valor" autocomplete="off" required placeholder="Valor">

        <input type="hidden" name="dataini" value="{{Session()->get('dataini')}}">
        <input type="hidden" name="datafi" value="{{Session()->get('datafi')}}">

        <button type="submit">Registar Despesa</button>
    </form>
</div>

<div id="preloader">
    <div class="inner">
       <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
       <div class="bolas">
          <div></div>
          <div></div>
          <div></div>                    
       </div>
    </div>
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

@endsection