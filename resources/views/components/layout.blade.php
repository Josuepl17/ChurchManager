<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo-nav')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('\icone.ico') }}" type="image/x-icon">

</head>

<body>

    <div class="conteiner-geral">

        <div class="conteiner-titulo">

            <h1>@yield('titulo')</h1>   <div id="logout" ><a href="/logout">Sair</a></div>
        </div>

        <main class="conteiner-menu-pesquisa-conteudo">
            
            <div id="menu-esquerdo" >
                <h1 class="h1-menu">Menu</h1>
                <a href="/">Home</a>
                <a href="/cadastro/membro">Cadastro Membro</a>
                <a href="/oferta">Cadastro Oferta</a>
                <a href="/despesas">Cadastro Despesas</a>
                <a href="/relatorio">Relatorios</a>
                <a href="/indexcaixa">Caixa</a>
            </div>

        
                <div class="conteiner-tabela">


                    @yield('conteudo')


                </div>
            

            

        </main>

        <div class="barrainferior">Usuário:&nbsp<span>{{ Auth::User()->user }}</span></div>

        

    </div>

    </div>






</body>

</html>