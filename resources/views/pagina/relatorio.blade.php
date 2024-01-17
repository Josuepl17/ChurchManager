<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio</title>
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

        .conteiner-colunas {
            
            width: 100%;
            height: 30vh;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: self-start;


        }

        .box {
            border: 1px solid black;
            width: 20%;
            height: 55%;
            margin-top: 40px;



        }

        .box-1 {
            display: flex;
            width: 100%;
            height: 20%;
            border: 1px solid black;
            font-size: 20px;
            justify-content: center;
            align-items: center;
            background-color: #0A1626;
            color: white;
        }

        .box-2 {
            display: flex;
            width: 100%;
            height: 65%;
            border: 1px solid black;
            background-color: white;
            justify-content: center;
            align-items: center;
        }

        .box-3 {
            display: flex;
            width: 100%;
            height: 18%;
            border: 1px solid black;
            justify-content: center;
            align-items: center;
            background-color: var(--subtitulos);
            color: white;
        }

        nav a {


            font-size: 20px;
            text-decoration: none;
            color: black;
            border: 1px solid black;
            padding: 6px;
            color: white;

        }



        nav a:hover {
            background-color: var(--titulos);
            color: white;
        }

        .box-3 a {
            text-decoration: none;
            color: white;
        }

        .box-3 a:hover {
            background-color: var(--fundos);
        }

        .filtro {
            padding-top: 10px ;
            display: flex;
            justify-content: center;
            align-items: center;


        }

        input {
            font-size: 20px;
            border-radius: 10px;
        }

        .botao{
            display: flex;
            width: 100%;
            height: 10%;
            justify-content: center;
            
            
        }

        .botao a{
            padding: 20px;
            border: #0A1626 solid 1px;
            font-size: 20px;
            text-decoration: none;
            background-color: var(--titulos);
            color: white;
            border-radius: 10px;
        }

        .botao a:hover{
            background-color: var(--fundos);
            
            transition: 0.4s;

            
        }

    </style>
</head>

<body>

    <div class="conteiner">
        <div class="titulo">
            <h1>Igreja Presbiteriana da Renovação</h1>
        </div>

        <nav> <a href="/">Home</a></nav>

        <div class="filtro">
            <form action="/filtro/pdf" method="post">
                @csrf

                <input type="date" name="dataini" id="dataini" value="{{ isset($dataIni) ? $dataIni : '' }}">
                <input type="date" name="datafi" id="datafi" value="{{ isset($dataFi) ? $dataFi : '' }}">

                <input style="border-radius: 0px;" type="submit" value="Filtrar">
            </form>
        </div>

        <div class="conteiner-colunas">
            <div class="box">
                <div class="box-1">
                    <p>Membros</p>
                </div>
                <div class="box-2">
                    <h1>{{ $qtymembros }}</h1>
                </div>
                <div class="box-3"> <a href="">
                        <p>Relatorio -></p>
                    </a> </div>
            </div>

            <div class="box">
                <div class="box-1">
                    <p>Dizimos</p>
                </div>
                <div class="box-2">
                    <h1>R${{ number_format($totaldizimos, 2, ',', '.') }}</h1>
                </div>
                <div class="box-3"> <a href="">
                        <p>Relatorio -></p>
                    </a> </div>
            </div>

            <div class="box">
                
                <div class="box-1">
                    <p>Ofertas</p>
                </div>
                <div class="box-2">
                    <h1>R${{ number_format($totalofertas, 2, ',', '.') }}</h1>
                </div>
                <div class="box-3"> <a href="">
                        <p>Relatorio -></p>
                    </a> </div>
            </div>

            <div class="box">
                <div class="box-1">
                    <p>Despesas</p>
                </div>
                <div class="box-2">
                    <h1>R${{ number_format($totaldespesas, 2, ',', '.') }}</h1>
                </div>
                <div class="box-3"> <a href="">
                        <p>Relatorio -></p>
                    </a> </div>
            </div>

        </div>

        <div class="botao">
            <a target="_blank" href="/gerar/{{ isset($dataIni) ? $dataIni : '1000-01-01' }}/{{ isset($dataFi) ? $dataFi : '5000-01-01' }}">Gerar Relatorio</a>

        </div>


 

        <form action="/fechar" method="post">
        
        <input type="hidden" name="dataini" value="{{ isset($dataIni) ? $dataIni : '1000-01-01' }}">
        <input type="hidden" name="datafi" value="{{ isset($dataFi) ? $dataFi : '5000-01-01' }}">
        <input type="hidden" name="totaldespesas" value="{{$totaldespesas}}">
        <input type="hidden" name="totaldizimos" value="{{$totaldizimos}}">
        <input type="hidden" name="totalofertas" value="{{$totalofertas}}">
        @csrf
        <input class="botao" type="submit" value="Registrar">
      </form>
            



    </div>
</body>

</html>