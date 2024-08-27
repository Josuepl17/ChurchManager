<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('aba-navegador')</title>
    <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
    <link href="{{ asset('css/oferta-dizimo-despesas-caixa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/impressao.css') }}" rel="print">

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <style>
        :root {
            --titulos: #111826;
            --subtitulos: #012841;
            --fundos: #1e1f1f55;
            --select: #00657c;
        }

        body {
            padding: 0px;
            margin: 0px;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        #conteiner-geral {
            width: 100%;
            height: 97dvh;
        }

        /*....................................................Parte 1............................................*/
        #cabecalho {
            display: flex;
            background-color: var(--titulos);
            height: 08%;
            width: 100%;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.271);
        }

        #cabecalho #usuario {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        #cabecalho h4 {
            color: white;
            margin-right: 50px;
            margin-left: 15px;
        }


        #cabecalho p {
            color: white;


        }

        #cabecalho img {
            width: 38px;
            margin-right: 15px;
        }

        /*....................................................Parte 2............................................*/


        #menu-subtable {
            display: flex;
            flex-direction: row;
            width: 100%;
            height: 92%;

        }

        #menu {
            display: flex;
            flex-direction: column;
            width: 16%;
            height: 100%;
            min-width: 150px;
            border-right: 1px solid rgba(0, 0, 0, 0.211);
            box-sizing: border-box;
            /*importante para Responsividade*/
            /*determina o tanto que o menu pode se diminuir para que a tabela não caia no overflow*/

        }



        #menu .links,
        #menu .links-1,
        #menu .links-2,
        #menu .links-3,
        #menu .links-4,
        #menu .links-5,
        #menu .links-6,
        #menu .links-7,
        #menu .links-8,
        #menu .links-9 {
            display: flex;
            flex-direction: row;
            align-items: center;
            text-decoration: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.211);
            width: 100%;
            height: 5%;
            color: black;
        }

        i{
            width: 09%;
        }

        

        #menu .links i,
        #menu .links-1 i,
        #menu .links-2 i,
        #menu .links-3 i,
        #menu .links-4 i,
        #menu .links-5 i,
        #menu .links-6 i,
        #menu .links-7 i,
        #menu .links-8 i,
        #menu .links-9 i {
            margin-left: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #menu .links p,
        #menu .links-1 p,
        #menu .links-2 p,
        #menu .links-3 p,
        #menu .links-4 p,
        #menu .links-5 p,
        #menu .links-6 p,
        #menu .links-7 p,
        #menu .links-8 p,
        #menu .links-9 p {
            margin-left: 5px;
        }

        #menu .links:hover,
        #menu .links-1:hover,
        #menu .links-2:hover,
        #menu .links-3:hover,
        #menu .links-4:hover,
        #menu .links-5:hover,
        #menu .links-6:hover,
        #menu .links-7:hover,
        #menu .links-8:hover,
        #menu .links-9:hover {
            background-color: var(--select);
            color: white;
            transition: 0.4s;
        }




        #menu h1 {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            background-color: var(--subtitulos);
            color: white;
            height: 07%;
            width: 100%;
        }






        /*....................................................Parte 3............................................*/

        #subtabela-conteudo {
            width: 100%;
            height: 100%;
            display: flex;
            /*usado para alinhar ao centro apenas*/
            flex-direction: column;
            align-items: center;
            background-color: var(--fundos);

        }

        #subtabela {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
            height: 07%;
            background-color: var(--subtitulos);
            border-bottom: 1px solid rgba(255, 255, 255, 0.445);

        }

        /*....................................................Parte 4............................................*/


        #titulo-pagina {
            display: flex;
            width: 97%;
            height: 04%;
            background-color: var(--subtitulos);
            color: white;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            border-radius: 4px 4px 0px 0px;
            margin-top: 0.5%;
        }


        #open-menu {
            display: none;
        }

        /*....................................................Parte 5............................................*/

        #conteudo {
            overflow: auto;
            /*rolagem tela de membros,as demais telas tem suas propiasrolagem */
            height: 84%;
            width: 97%;
            background-color: white;
            border-radius: 0px 0px 5px 5px;

        }

        i img{
            width: 20px;
           
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            color: #000;
            z-index: 9999;
        }

        .spinner {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }




        /*............... mudanças Telefone................*/

        @media (max-width: 700px) {
            /* Para diminuir tem que cortar texto */
            /*importante para Responsividade*/

            #open-menu {
                display: block;
                position: fixed;
                top: 1%;
                left: 3%;
                cursor: pointer;
                color: #fff;
                font-size: 24px;

            }

            #menu {
                width: 250px;
                height: 100%;
                position: fixed;
                top: 0;
                left: -250px;
                transition: left 0.3s ease;
                background-color: white;
                z-index: 1;
                box-shadow: 15px 2px 2px solid black;

            }

            #menu a {
                color: black;

            }

            #menu h1 {
                background-color: var(--titulos);
                color: white;
                height: 7%;
            }

            #cabecalho {
                display: flex;
                justify-content: flex-end;
            }

            #cabecalho h4 {
                display: none;


            }


            .remover {
                /* CSS criado para remover itens da Tela para Celular*/
                display: none;
                /*importante para Responsividade*/
            }


        }

        @media print {

            *{
                color: black;
                
            }
            #menu {
                display: none;
            }

            #cabecalho {
                display: none;
            }

            #subtabela {
                display: none;
            }

            title {
                display: none;
            }


            #valor-registrar {
                font-size: 50px;
            }

            #titulo-pagina p {
                font-size: 50px;
            }

            #formulario-registro {
                display: none;
            }

        }


    </style>

    <!--<div id="preloader">
        <div class="spinner"></div>
    </div>
</head>-->

<body>
    <div id="conteiner-geral">

        <nav id="cabecalho">
            <h4>{{$razao_empresa}}</h4>
            <div id="usuario">
                <p>Bem Vindo {{ Auth::User()->nome }}</p> &nbsp; &nbsp;
                <img src="{{ asset('logo.png') }}" alt="alt">
            </div>
        </nav> <!--cabecalho-->


        <div id="menu-subtable">

            <div id="menu">

                <div id="open-menu">&#9776;</div>
                <h1>
                     <i class="fa-solid fa-compass"></i>
                      &nbsp; Menu</h1>

                <a class="links-1" href="/">
                    <i ><img src="{{ asset('botao-home.png') }}" alt=""></i> &nbsp; <p>Home</p>
                </a>

                <a class="links-2" href="/oferta">
                <i ><img src="{{ asset('dinheiro.png') }}" alt=""></i> &nbsp; <p>Ofertas</p>
                </a>

                <a class="links-3" href="/despesas">
                <i ><img src="{{ asset('despesas.png') }}" alt=""></i> &nbsp; <p>Despesas</p>
                </a>

                <a class="links-8" href="/eventos">
                <i ><img src="{{ asset('comparecimento.png') }}" alt=""></i> &nbsp; <p>Presença</p>
                </a>

                <a class="links-4" href="/relatorio">
                <i ><img src="{{ asset('pago.png') }}" alt=""></i> &nbsp; <p>Resumo</p>
                </a>

                <a class="links-5" href="/indexcaixa">
                <i ><img src="{{ asset('contrato.png') }}" alt=""></i> &nbsp; <p>Caixa</p>
                </a>

                @admin
                <a class="links-6" href="/user/profile">
                <i ><img src="{{ asset('sombra-de-usuario-masculino.png') }}" alt=""></i> &nbsp; <p>Usuarios</p>
                </a>


                <!-- <a class="links" href="/cadastro/login/novo">
                <i class="fa-solid fa-users"></i> &nbsp; <p>Novo Usuario</p>
                    
                </a> -->

                @endadmin

                <a class="links-7" href="/selecionar/filial">
                <i ><img src="{{ asset('companhia.png') }}" alt=""></i> &nbsp; <p>Selecionar Filial</p>

                </a>

                <a class="links-9" href="/logout">
                <i ><img src="{{ asset('simbolo-de-logout.png') }}" alt=""></i> &nbsp; <p>Logaut</p>

                </a>


            </div> <!--menu-->


            <div id="subtabela-conteudo">



                <div id="subtabela">
                    @yield('botao-tabela')
                </div> <!--subtabela-->

                <div id="titulo-pagina">
                    <h3>@yield('titulo-pagina')</h3>
                </div> <!--titulo-pagina-->

                <div id="conteudo">
                    @yield('conteudo')
                </div> <!--conteudo-->


                <div id="valor-registrar">
                    <p>@yield('valor-registrar')</p>
                </div> <!--valor-registrar-->


            </div> <!--subtabela-conteudo-->
        </div> <!--menu-subtable-->
    </div> <!--conteiner-geral-->
</body>

<script>
    const menu = document.querySelector('#menu');
    const openMenuButton = document.getElementById('open-menu');

    openMenuButton.addEventListener('click', () => {
        menu.style.left = menu.style.left === '0px' ? '-250px' : '0px';
    });
</script>

<!--<script> 
        document.addEventListener("DOMContentLoaded", function() {
            var loadingScreen = document.getElementById("preloader");
            var content = document.getElementById("conteiner-geral");

            
            setTimeout(function() {
                loadingScreen.style.display = "none";
                content.style.display = "block";
            }); 
        });
 
</script> -->


<script src="https://kit.fontawesome.com/f3856694cb.js" crossorigin="anonymous"></script>

<script src="{{ asset('/sw.js') }}"></script>
<script>
    if ("serviceWorker" in navigator) {
        // Register a service worker hosted at the root of the
        // site using the default scope.
        navigator.serviceWorker.register("/sw.js").then(
            (registration) => {
                console.log("Service worker registration succeeded:", registration);
            },
            (error) => {
                console.error(`Service worker registration failed: ${error}`);
            },
        );
    } else {
        console.error("Service workers are not supported.");
    }
</script>

<script>
    document.getElementById('botao-instalar').addEventListener('click', function() {
        // Solicitar a instalação do PWA
        if (window.matchMedia('(display-mode: browser)').matches) {
            // Se estiver no navegador, forçar a instalação
            window.addEventListener('beforeinstallprompt', (event) => {
                // Mostrar o prompt de instalação
                event.prompt();
            });
        }
    });
</script>
@livewireScripts
</html>