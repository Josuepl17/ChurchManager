<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo-nav')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('\icone.ico') }}" type="image/x-icon">

</head>
<style>
    :root {
        --titulos: #0A1626;
        --subtitulos: #023859;
        --fundos: #0D8AA6;

        --cor-secundaria: #313131e7;
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

        border: 1px solid rgba(0, 0, 0, 0.34);
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

    .excluir {
        margin: auto;
        background-color: red;
        font-size: 20px;
        height: 100%;
        width: 100%;
        color: white;



    }

    .inserir {
        margin: auto;
        background-color: rgb(0, 48, 0);
        font-size: 20px;
        color: white;
        height: 100%;
        width: 100%;
    }
</style>

<body>

    <div class="conteiner-geral">

        <div class="conteiner-titulo">

            <h1 id="titulo">@yield('titulo')</h1>



        </div>

        <main class="conteiner-menu-pesquisa-conteudo">

            <div class="menu-esquerdo">
                <h1 class="h1-menu">Menu</h1>
                <a id="index" href="/principal">Home</a>
                <a id="formulario" href="/cadastro/membro">Cadastro Membro</a>
                <a id="oferta" href="/oferta">Cadastro Oferta</a>
                <a id="despesas" href="/despesas">Cadastro Despesas</a>
                <a href="/relatorio">Relatorios</a>
                <a id="caixa" href="/indexcaixa">Caixa</a>
            </div>

            <div class="conteiner-navtable">






                <div id="conteiner-tabela">





                </div>
            </div>

        </main>

        <div class="barrainferior">@Copyright</div>

    </div>

    </div>






</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var botoes = [
            { id: 'formulario', url: '/cadastro/membro', method: 'GET' },
            { id: 'oferta', url: '/oferta', method: 'GET' },
            { id: 'despesas', url: '/despesas', method: 'GET' },
            { id: 'caixa', url: '/indexcaixa', method: 'GET' },
            { id: 'index', url: '/principal', method: 'GET' },
            // adicione mais botões, URLs e métodos conforme necessário
        ];

        botoes.forEach(function(botao) {
            $('#' + botao.id).click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: botao.url,
                    type: botao.method,
                    success: function(data) {
                        $('#conteiner-tabela').html(data);
                    }
                });
            });
        });
    });
</script>



</html>