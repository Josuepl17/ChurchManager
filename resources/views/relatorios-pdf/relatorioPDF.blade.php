<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio</title>
    <style>
/* Estilos gerais */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

.conteiner {
    width: 80%;
    margin: 0 auto;
    page-break-inside: avoid;
}

h1 {
    color: #333;
    text-align: center;
}

hr {
    margin-bottom: 20px;
}

/* Estilos da tabela */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #fff;
}

/* Estilos do rodapé */
p {
    text-align: center;
    margin-top: 40px;
}

/* Estilos do totalizador */
.total {
    font-weight: bold;
    text-align: right;
}

    </style>
</head>

<body>





    <div class="conteiner">
    <h1>Relatorio Dizimos</h1>
    <hr>

        <table>



            <tr style="border-bottom: 1px solid black;">
                <th>ID</th>
                <th>DATA</th>
                <th>VALOR</th>




            </tr>


            @foreach ($dizimos as $dizimo)


            <tr>
                <td>{{ $dizimo->id}}</td>


                <td>{{ \Carbon\Carbon::parse($dizimo->data)->format('d/m/Y') }}</td>
                <td>R$ {{ number_format($dizimo->valor, 2, ',', '.') }}</td>



            </tr>



            @endforeach


            <tr>
                <td colspan="3" style="font-weight: bold;">TOTAL: R$ {{ number_format($totaldizimos, 2, ',', '.') }}</td>

            </tr>


        </table>

        <br>
        <br>



    </div>





    <div class="conteiner">

    <h1>Relatorio Ofertas</h1>
    <hr>

        <table>



            <tr style="border-bottom: 1px solid black;">
                <th>ID</th>
                <th>DATA</th>
                <th>VALOR</th>




            </tr>


            @foreach ($ofertas as $oferta)


            <tr>
                <td>{{ $oferta->id}}</td>


                <td>{{ \Carbon\Carbon::parse($oferta->data)->format('d/m/Y') }}</td>
                <td>R$ {{ number_format($oferta->valor, 2, ',', '.') }}</td>



            </tr>



            @endforeach


            <tr>
                <td colspan="3" style="font-weight: bold;">TOTAL: R$ {{ number_format($totalofertas, 2, ',', '.') }}</td>

            </tr>


        </table>

        <br>
        <br>




    </div>





    <div class="conteiner">
    <h1>Relatorio Despesas</h1>
    <hr>


        <table>
            <tr style="border-bottom: 1px solid black;">
                <th>ID</th>
                <th>DATA</th>
                <th>DESCRIÇÃO</th>
                <th>VALOR</th>
            </tr>


            @foreach ($despesas as $despesa)


            <tr>
                <td>{{ $despesa->id}}</td>
                <td>{{ \Carbon\Carbon::parse($despesa->data)->format('d/m/Y') }}</td>
                <td>{{$despesa->descricao}}</td>
                <td>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</td>
            </tr>

            @endforeach

            <tr>
                <td colspan="4" style="font-weight: bold;">TOTAL: R$ {{ number_format($totaldespesas, 2, ',', '.') }}</td>
            </tr>


        </table>

        <br>
        <br>

        <p>_____________________________________</p>
        <p>Assinatura</p>


    </div>











</body>

</html>