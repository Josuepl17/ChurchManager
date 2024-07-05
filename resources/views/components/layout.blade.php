<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tela')</title>
    <link href="{{ asset('css/oferta-dizimo-despesas.css') }}" rel="stylesheet">

    <style>
        :root {

            --titulos: #0a1727;
            --subtitulos: #012841;
            --fundos: #37383842;
            --cor-secundaria: #5353533d;
        }

        body {
            padding: 0px;
            margin: 0px;
        }

        * {
            padding: 0;
            margin: 0;
        }

        #conteiner-geral {
            width: 100%;
            height: 97vh;
        }


        #cabecalho {
            display: flex;
            background-color: var(--titulos);
            height: 08%;
            width: 100%;
            align-items: center;
            justify-content: flex-end;
            border-bottom: 1px solid rgba(255, 255, 255, 0.271);
            


        }


        #cabecalho p {
            color: white;
            margin-right: 15px;
        }

        /*......................................................*/


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
            /*importante para Responsividade*/
            /*determina o tanto que o menu pode se diminuir para que a tabela não caia no overflow*/

        }

        .links {
            display: flex;
            flex-direction: row;
            align-items: center;
            text-decoration: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.211);
            width: 100%;
            height: 5%;
            color: black;


        }

        .links i{
            margin-left: 10px;
        }
        .links p{
            margin-left: 05px;
        }



        .links:hover {
            background-color: var(--subtitulos);
            color: white;
            transition: 0.4s;
        }




        #menu h1 {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            background-color: var(--titulos);
            color: white;
            height: 05%;
            width: 100%;
            
            
        }

        #titulo-pagina{
            display: flex;
            width: 100%;
            height: 04%;
            background-color: var(--titulos);
            color: white;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.271);
            
        }



        /*...................................................................*/

        #subtabela-conteudo {
            width: 100%;
            height: 100%;
            display: flex;
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


        #open-menu {
            display: none;
        }







        /*..........................................................*/

        #conteudo {
            overflow: auto;
            /*rolagem tela de membros,as demais telas tem suas propiasrolagem */
            height: 84%;
            width: 97%;
            margin-top: 0.5%;
            background-color: white;
            border-radius: 5px;
            background-color: var(--cor-secundaria);


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

            #cabecalho h1 {
                display: none;
                text-align: end;
            }


            .remover {
                /* CSS criado para remover itens da Tela para Celular*/
                display: none;
                /*importante para Responsividade*/
            }


        }
    </style>
</head>

<body>
    <div id="conteiner-geral">

        <nav id="cabecalho">
            
            <p>Bem Vindo {{ Auth::User()->user }} !</p>
        </nav> <!--cabecalho-->

        <div id="menu-subtable">

            <div id="menu">
                <div id="open-menu">&#9776;</div>
                <h1>Menu</h1>

                <a class="links" href="/">
                <i class="fa-solid fa-house"></i> &nbsp; <p>Home</p>
                </a>

                <a class="links" href="/oferta">
                <i class="fa-solid fa-money-bill"></i> &nbsp; <p>Ofertas</p>
                </a>

                <a class="links" href="/despesas">
                <i class="fa-solid fa-coins"></i> &nbsp; <p>Despesas</p>
                </a>

                <a class="links" href="/indexcaixa">
                <i class="fa-solid fa-briefcase"></i> &nbsp; <p>Caixa</p>
                </a>

                <a class="links" href="/relatorio">
                <i class="fa-solid fa-book"></i>  &nbsp; <p>Resumo</p>
                </a>

                <a class="links" href="/user/profile">
                <i class="fa-solid fa-user"></i> &nbsp; <p>Usuarios</p>
                </a>

                <a class="links" href="/cadastro/login/novo">
                <i class="fa-solid fa-people-arrows"></i>  &nbsp; <p>Novo Usuario</p>
                    
                </a>
                <a class="links" href="/logout">
                <i class="fa-solid fa-right-from-bracket"></i> &nbsp; <p>Logout</p>
                    
                </a>
            </div> <!--menu-->


            <div id="subtabela-conteudo">

            <div id="titulo-pagina" ><h3>@yield('titulo-pagina')</h3></div>

                <div id="subtabela">
                    @yield('botao-tabela')
                </div> <!--subtabela-->


                <div id="conteudo">
                    @yield('conteudo')
                </div> <!--conteudo-->


                <div id="valor-registrar">
                    @yield('valor-registrar')
                </div>


            </div> <!--subtabela-conteudo-->
        </div> <!--cabecalho-->
    </div> <!--menu-subtable-->
</body>

<script>
    const menu = document.querySelector('#menu');
    const openMenuButton = document.getElementById('open-menu');

    openMenuButton.addEventListener('click', () => {
        menu.style.left = menu.style.left === '0px' ? '-250px' : '0px';
    });
</script>


<script src="https://kit.fontawesome.com/f3856694cb.js" crossorigin="anonymous"></script>
</html>