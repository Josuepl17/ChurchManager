@extends('components.layout')

@section('conteudo')  
@section('titulo', 'DESPESAS' )
@section('titulo-nav', 'Despesas' )





        <div class="conteudo">
            <table>
                <tr>
                    <th style="width: 4%;">ID</th>
                    <th>DATA INICIAL</th>
                    <th>DATA FINAL</th>
                    <th>VALOR DIZIMOS</th>
                    <th>VALOR OFERTAS</th>
                    <th>VALOR DESPESAS</th>
                    <th style="width: 4%;">X</th>
                </tr>
        
                @foreach ( $dados as $caixa)
                <tr>
                    <td style="background-color: var(--titulos) ; color:white">{{ $caixa->id}}</td>
                    <td>{{\Carbon\Carbon::parse($caixa->dataini)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($caixa->datafi)->format('d/m/Y')}}</td>
                    <td>R$ {{ number_format($caixa->dizimos, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($caixa->ofertas, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($caixa->despesas, 2, ',', '.') }}</td>
                    <td>
                        <form method="post" class="formx" action="/destroy/oferta/"><button class="excluir">X</button>
                            @csrf</form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>



    @endsection