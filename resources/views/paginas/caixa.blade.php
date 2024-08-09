@extends('components.layout')
@section('aba-navegador', 'Caixa-Feixados' )
@section('titulo-pagina', 'Caixa-Feixados' )





@section('conteudo')
<div id="tabela-dados" >
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
                <form  method="post" class="formx" action="/destroy/caixa/{{$caixa->id}}"><button >X</button>
                    @csrf</form>
            </td>
        </tr>
         
        @endforeach

            

    </table>
   
</div>

<div id="valor-total">
            <p>VALOR TOTAL: R$
            <p style="color: green; font-weight: bold;">{{ number_format($saldo, 2, ',', '.') }}</p>
            </p>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.links-5');
            links.forEach(link => {
                link.style.backgroundColor = 'rgb(228, 228, 228)';
                link.style.color = 'black';
            });
        });
    </script>
@endsection

