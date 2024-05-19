<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Usuarios</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        :root {

            --titulos: #0A1626;
            --subtitulos: #023859;
            --fundos: #0D8AA6;
            --cor-secundaria: #5353533d;
        }


        body {
            background-color: var(--cor-secundaria);
        }

        .titulo {
            border: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 10vh;
            background-color: #0A1626;
            color: white;
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



        nav a {


            font-size: 17px;
            text-decoration: none;
            color: black;
            border: 1px solid black;
            padding: 6px;
            color: white;
            background-color: var(--cor-secundaria);

        }








        .botao {
            display: flex;
            width: 100%;
            height: 10%;
            justify-content: center;


        }

        .botao a {
            padding: 20px;
            border: #0A1626 solid 1px;
            font-size: 20px;
            text-decoration: none;
            background-color: var(--titulos);
            color: white;
            border-radius: 10px;
        }

        .botao a:hover {
            background-color: var(--fundos);

            transition: 0.4s;


        }

        #menu{
            border: 1px solid black;
            display: flex;
            width: 100%;
            min-height: 550px;
            max-height: 550px;
        }

        table {
        border-collapse: collapse;
           text-align: center;
            font-size: 20px;
   
        margin: auto;
        width: 50%;
        background-color: white;
        margin-top: 0px;
        color: black;

    }




    td:hover {
        color: white;
        
    }




    th {
        border: 1px solid black;
        border-top: none;
        border-left: none;

        font-size: 20px;
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





    </style>
</head>

<body>

    <div class="conteiner">
        <div class="titulo">
            <h1>{{$nomeempresa->razao}}</h1>
        </div>

        <nav> <a href="/">MENU PRINCIPAL</a></nav>

    <div id="menu">
    <table>
            <tr>
                <th style="width: 4%;">ID</th>
                <th>USUARIO</th>
                
           
                <th style="width: 4%;">X</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td style="background-color: var(--titulos); color:white">{{$user->id}}</td>
         
                <td>{{$user->user}}</td>

            </tr>
            @endforeach
        </table>
    </div>

















</body>

</html>