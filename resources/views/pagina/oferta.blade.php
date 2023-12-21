<x-layout>

    <style>
        .table2 {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 80%;
            border: 1px solid black;
            border-bottom: #025951 5px solid;
            overflow: auto;


        }

        .id {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;





        }

        label {
            font-size: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            padding: 10px;

        }



        .cad {
            width: 30%;
            text-transform: uppercase;
            font-size: 20px;
            padding: 2px;
            border: 3px solid black;
            text-align: center;


        }

        .h1m {
            color: black;
            font-size: 50px;
        }

        .id button {
            margin: 0px;
            color: black;
            text-decoration: none;

            padding-bottom: 0;
            font-size: 20px;
            width: 180px;
            height: 40px;
            border: 3px solid black;
            background-color: #177373;
            color: white;


        }

        .id button:hover {
            background-color: #025951;
            color: white;

            transition: 0.6s;

        }

        .excluir {
            margin: auto;
            background-color: red;
            font-size: 20px;
            height: 100%;
            width: 40%;
            margin-top: -2px;


        }


        .excluir:hover {
            color: aliceblue;

            background-color: red;
            transition: 0.6;
        }

        table {
            border-collapse: collapse;



            margin: auto;
            border-radius: 50px;
            width: 100%;
            background-color: white;
            margin-top: -2px;
            color: black;

        }

        td {

            border: 1px solid black;
            text-align: center;
            font-size: 18px;
            margin-top: 0px;
            margin-bottom: 0px;
        }


        td:hover {
            color: white;
        }




        th {
            border: 1px solid black;
            font-size: 20px;
            color: white;
            background-color: #025951;
            position: sticky;
            top: -1px;
            padding-top: 5px;

        }

        tr:hover {
            background-color: #177373;
            color: white;
        }



        .formx {

            display: flex;
            width: 100%;
            flex-direction: none;
            align-items: none;
            margin-top: none;
            justify-content: none;



        }

        .valortotal {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 9%;
            width: 100%;
            background-color: #025951;

        }

        .valortotal p {
            color: black;

            margin-top: 25px;
            background-color: white;



        }

        .filtro{
            display: flex;
            width: 100%;
            background-color: #177373;
            padding-top: 5px;
            padding-bottom: 5px;
            height: 7%;
        }

        .filtro form{
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }
    </style>


    <div class="table2">
    <div class="filtro">
        <form action="/filtrar" method="get">
            <input type="date" name="dataini" id="dataini" value="2023-12-01">
            <input type="date" name="datafi" id="datafi" value="2023-12-01">
            <input type="submit" value="Filtrar" style="width: 5%;">
        </form>
    </div>

        <table>



            <tr>
                <th>ID</th>
                <th>DATA</th>
                <th>VALOR</th>
                <th>X</th>


            </tr>
            @foreach ($ofertas as $oferta)


            <tr>
                <td style="background-color: grey; color:white">{{$oferta->id}}</td>
                <td>{{$oferta->data}}</td>
                <td>R${{$oferta->valor}}</td>

                <td>
                    <form method="post" class="formx" action="/destroy/oferta/{{$oferta->id}}"><button class="excluir">X</button>
                        @csrf</form>
                </td>
            </tr>

            @endforeach

        </table>

        <div class="valortotal">
            <p>VALOR TOTAL: R$
            <p style="color: green; margin-right: 20px; font-weight: bold;">{{$totalofertas}},00</p>
            </p>
        </div>


    </div>


    <form class="id" action="/registrar/oferta" method="post">
        @csrf
        <label for="data">Data:</label>
        <input class="cad" type="date" name="data" id="data" autocomplete="off" required>

        <label for="valor">Valor:</label>
        <input class="cad" type="text" name="valor" id="valor" autocomplete="off" required>

        <br>

        <button type="submit">Registar Oferta</button>
    </form>
</x-layout>