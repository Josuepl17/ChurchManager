<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('aba-navegacao')</title>
        <style>

        * {
            margin: 0px;
            padding: 0px;
        }

        :root {
    --titulos: #0A1626;
    --subtitulos: #023859;
    --fundos: #064654;
    --select: #00657c;
    
        }

        #conteiner-geral {
            width: 100%;
            height: 97vh;
        }

        .titulo {
            border: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 08%;
            background-color: #0A1626;
            color: white;
        }

        nav {
            border: 1px solid black;
            display: flex;
            width: 100%;
            height: 5%;
            justify-content: flex-start;
            align-items: center;
            background-color: var(--subtitulos);

        }

        nav a {
            font-size: 16px;
            text-decoration: none;
            color: black;
            border-right: white 1px solid;
            padding: 6px;
            color: white;
            background-color: var(--cor-secundaria);

        }

        nav a:hover {
            background-color: var(--titulos);
            color: white;
        }

        #conteudo{
            display: flex;
            width: 100%;
            height: 80%;
            border: 1px solid black;
        }

    </style>
    </head>

    <body>

        <div id="conteiner-geral">
            <div class="titulo">
                <h3>{{$razao_empresa}} </h3>
            </div>

            <nav>
                <a href="/">Menu Principal</a>
                @yield('navegacao')
            </nav>

            <div id="conteudo">
                @yield('conteudo')
            </div>

        </body>

    </html>