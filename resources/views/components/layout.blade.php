<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerencimento de Igrejas</title>

    <style>
        .troywell-avia {
            border: none;
        }

        .troywell-caa {
            border: none;
        }

        h1 {
            font-family: 'Times New Roman', Times, serif;
            color: white;
        }

        body {
            background-color: white;
        }

        .conteiner-geral {
            margin: auto;
            height: 70vh;
            width: 100%;

        }

        /* Conteiner-Titulo */


        .conteiner-titulo {
            display: flex;
            border: 1px solid black;
            justify-content: center;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
            background-color: #025951;
            border-radius: 10px 10px 0px 0px;
            box-shadow: black 1px 1px 1px;

        }

        /* Conteiner Menu-Pesquisa-Conteudo */
        .conteiner-menu-pesquisa-conteudo {
            display: flex;
            margin-left: 10px;
            margin-right: 10px;
            justify-content: center;
            height: 107%;



        }




        /* Menu Lateral Esquerdo*/
        .menu-esquerdo {
            display: flex;
            flex-direction: column;
            width: 20%;
            height: 100%;
            text-align: center;
            justify-content: flex-start;
            margin-right: 10px;
            border: 1px solid black;
            border-top: none;
            background-color: #177373;
        }

        .h1-menu {
            margin-top: 0px;
            width: 100%;
            border: 1px solid black;
            background-color: #025951;

        }

        a {

            text-decoration: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            width: 100%;

            padding-bottom: 6px;
            font-size: 20px;
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-bottom: #025951 solid 1px;

        }

        a:hover {
            color: black;
            background-color: white;
            transition: 0.3s;
        }





        /* Conteiner-Pesquisa-Conteudo */

        .conteiner-navtable {

            flex-wrap: wrap;
            width: 100%;
            height: 100%;
            border: 1px solid black;
            border-top: none;
            border-left: none;
            justify-content: center;
        }




        input {
            font-size: 20px;
            width: 20%;
            margin-top: 2px;
            height: 75%;
            margin-right: 10px;
            border-radius: 10px;

        }

        /* Tabela*/
        .conteiner-tabela {

            border: 1px solid black;
            width: 100%;
            height: 97.5%;
            background-color: white;
            border: 1px solid black;
            font-size: 20px;
            overflow: auto;
        }



        /* FIM TABELA */

        .barrainferior {
            display: flex;

            height: 50px;
            border: 1px solid black;
            margin-left: 10px;
            margin-right: 9px;
            background-color: #025951;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;

        }
    </style>

</head>

<body>

    <div class="conteiner-geral">

        <div class="conteiner-titulo">

            <h1></h1>
        </div>

        <main class="conteiner-menu-pesquisa-conteudo">
            
            <div class="menu-esquerdo">
                <h1 class="h1-menu">Menu</h1>
                <a href="/">Home</a>
                <a href="/cadastro/membro">Cadastro Membro</a>
                <a href="/oferta">Cadastro Oferta</a>
                <a href="/despesas">Cadastro Despesas</a>
                <a href="/caixa">Caixa</a>
            </div>

            <div class="conteiner-navtable">






                <div class="conteiner-tabela">


                    {{ $slot }}


                </div>
            </div>

        </main>

        <div class="barrainferior">@Copyright</div>

    </div>

    </div>






</body>

</html>