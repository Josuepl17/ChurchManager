@extends('components.layout-tela')
@section('aba-navegacao', 'Usuarios')

    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        nav {
            border: 1px solid black;
            display: flex;
            width: 100%;
            height: 5vh;
            justify-content: flex-start;
            align-items: center;
            background-color: var(--subtitulos);

        }



        #tabela-usuarios {
            
            display: flex;
            width: 100%;
            align-items: flex-start;
            justify-content: flex-start;
            
        }

        table {
            border-collapse: collapse;
            text-align: center;
            font-size: 20px;
            width: 40%;
            background-color: white;
            margin-top: 0px;
            color: black;

        }




        th {
            font-size: 14px;
            color: white;
            background-color: #0A1626;;
            position: sticky;
            top: -1px;
            padding-top: 5px;


        }
        td{
            font-size: 15px;
        }

        tr {
            border-bottom: 1px solid black;
        }
    </style>
</head>

<body>

        @section('conteudo')

        <div id="tabela-usuarios">
            <table>
                <tr>
                    <th style="width: 4%;">ID</th>
                    <th>USUARIOS</th>
                    
                    

                </tr>
                @foreach ($users as $user)
                <tr>
                    <td style="background-color: var(--titulos); color:white">{{$user->id}}</td>
                    <td>{{$user->user}}</td>
                    
                </tr>
                @endforeach
            </table>
@endsection

</body>

</html>