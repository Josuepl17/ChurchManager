<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('aba-navegacao')</title>
        <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
        
        <style>

        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
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
            
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 08%;
            background-color: #0A1626;
            color: white;
        }

        nav {
            
            display: flex;
            width: 100%;
            height: 5%;
            justify-content: flex-start;
            align-items: center;
            background-color: var(--subtitulos);
            

        }



        #conteudo{
            display: flex;
            width: 100%;
            height: 86%;
            
            flex-direction: column;
            background-color: rgb(192, 192, 192);
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