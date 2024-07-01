@extends('components.layout')

@section('conteudo')
@section('titulo', 'CAIXA' )
@section('titulo-nav', 'Caixa' )


<style>
    .conteudo {
        width: 100%;
        height: 90%;
        border: 1px solid black;
        overflow: auto;
     
    }

    td {

        
        text-align: center;
        font-size: 18px;
        margin-top: 0px;
        margin-bottom: 0px;
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




    td:hover {
        color: white;
    }




    th {
        border: 1px solid white;
        border-top: none;
        border-left: none;
        font-size: 14px;
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
</style>


<div class="conteudo">
    <table>
        <tr>
            <th>ID</th>
            <th style="color: yellow;" >DATA INICIAL</th>
            <th style="color: yellow;" >DATA FINAL</th>
            <th style="color: rgb(0, 254, 0); " >DIZIMOS</th>
            <th style="color: rgb(0, 254, 0);" >OFERTAS</th>
            <th style="color:red;" >DESPESAS</th>
            <th style="color:blue;" >SALDO</th>
            <th >X</th>
        </tr>

        @foreach ( $dados as $caixa)
        <tr>
            <td style="background-color: var(--titulos) ; color:white">{{ $caixa->id}}</td>
            <td>{{\Carbon\Carbon::parse($caixa->dataini)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($caixa->datafi)->format('d/m/Y')}}</td>
            <td  >R$ {{ number_format($caixa->totaldizimos, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($caixa->totalofertas, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($caixa->totaldespesas, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($caixa->saldo, 2, ',', '.') }}</td>
            <td>
                <form method="post" class="formx" action="/destroy/caixa/{{$caixa->id}}"><button class="excluir">X</button>
                    @csrf</form>
            </td>
        </tr>
         
        @endforeach

            

    </table>
   
</div>

<div class="valortotal">
            <p>VALOR TOTAL: R$
            <p style="color: green; font-weight: bold;">{{ number_format($saldo, 2, ',', '.') }}</p>
            </p>
        </div>



@endsection