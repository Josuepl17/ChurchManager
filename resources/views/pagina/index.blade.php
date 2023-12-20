<x-layout>

    <style>
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

        .excluir {
            margin: auto;
            background-color: red;
            font-size: 20px;
            height: 100%;
            width: 100%;



        }

        .inserir {
            margin: auto;
            background-color: green;
            font-size: 20px;
            height: 100%;
            width: 100%;
        }
    </style>



    <table>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>ENDEREÇO</th>
            <th>FUNÇÃO</th>
            <th>TELEFONE</th>
            <th>X</th>
            <th>X</th>

        </tr>



        @foreach ($index as $ind)



        <tr>

            <td style="background-color: grey; color:white">{{ $ind->id }}</td>
            <td>{{ $ind->nome }}</td>
            <td>{{ $ind->endereco }}</td>
            <td>{{ $ind->funcao }}</td>
            <td>{{ $ind->telefone }}</td>
            <td>
                <form class="formx" action="/inserir/dizimos/{{ $ind->id }}"><button class="inserir">Inserir</button></form>
            </td>
            <td>

                <form action="/destroy/{{$ind->id}}" method="post"><button class="excluir">X</button>
                    @csrf
                </form>
            </td>

        </tr>


        @endforeach




    </table>

</x-layout>