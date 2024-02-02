<x-layout>

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



        <tr>
            <td style="background-color: var(--titulos) ; color:white">{{ $oferta->id}}</td>
            <td>{{\Carbon\Carbon::parse($)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($)->format('d/m/Y')}}</td>
            <td>R$ {{ number_format($, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($, 2, ',', '.') }}</td>

            <td>
                <form method="post" class="formx" action="/destroy/oferta/{{$oferta->id}}"><button class="excluir">X</button>
                    @csrf</form>
            </td>

        </tr>



        @endforeach

    </table>


</x-layout>