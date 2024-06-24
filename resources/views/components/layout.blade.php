<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .conteiner-geral {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .conteiner-titulo {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
        }
        .conteiner-menu-pesquisa-conteudo {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #menutabela-barra {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f9f9f9;
            padding: 20px;
        }
        #menu-tabela {
            display: flex;
            justify-content: space-between;
            max-width: 800px;
            width: 100%;
        }
        #menu-esquerdo {
            flex-basis: 30%;
            background-color: #fff;
            padding: 10px;
            border-right: 1px solid #ddd;
        }
        #menu-esquerdo h1 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        #menu-esquerdo a {
            display: block;
            margin-bottom: 5px;
            text-decoration: none;
            color: #333;
        }
        #menu-esquerdo a:hover {
            color: #007bff;
        }
        .conteiner-tabela {
            flex-basis: 70%;
            background-color: #fff;
            padding: 10px;
        }
        .barrainferior {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }
        .barrainferior span {
            font-weight: bold;
        }
        #logoff img {
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="conteiner-geral">
        <div class="conteiner-titulo">
            <h1>@yield('titulo')</h1>
        </div>
        <main class="conteiner-menu-pesquisa-conteudo">
            <div id="menutabela-barra">
                <div id="menu-tabela">
                    <div id="menu-esquerdo">
                        <h1 class="h1-menu">Menu</h1>
                        <a href="/">Home</a>
                        <a href="/oferta">Cadastro Oferta</a>
                        <a href="/despesas">Cadastro Despesas</a>
                        <a href="/relatorio">Relatórios</a>
                        <a href="/indexcaixa">Caixa</a>
                        <a href="/user/profile">Usuários</a>
                        <a href="/cadastro/login/novo">Novo Usuário</a>
                        <a id="logoff" href="/logout"><img src="{{ asset('\sair.png') }}" alt="">&nbsp;Logout</a>
                    </div>
                    <div class="conteiner-tabela">
                        @yield('conteudo')
                    </div>
                </div>
                <div class="barrainferior">Usuário:&nbsp;<span>{{ Auth::User()->user }}</span></div>
            </div>
        </main>
    </div>
</body>
</html>