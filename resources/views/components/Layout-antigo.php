<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo-nav')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('\icone.ico') }}" type="image/x-icon">
    <style>
        :root {

--titulos: #0a1727;
--subtitulos: #012841;
--fundos: #0d8aa6;
--cor-secundaria: #5353533d;
}


*{
    box-sizing: border-box;
}



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
background-color: rgba(255, 255, 255, 0.473);
}

.conteiner-geral {
display: flex;
flex-direction: column;

height: 97vh;


}

/* Conteiner-Titulo */


.conteiner-titulo {
display: flex;
width: 100%;
height: 08%;

justify-content: center;
align-items: center;
background-color: var(--titulos);
border-radius: 10px 10px 0px 0px;
box-shadow: black 1px 1px 1px;
border-bottom: solid 1px white;

}


#novo_usuario{
    position: absolute;
    right: 85px;
    top: 25px;
}
#novo_usuario a{

    background-color: var(--subtitulos);
    padding-left: 10px;
    padding-right: 10px;
    }
    
    #novo_usuario a:hover{
    background-color: var(--fundos);
    transition: 0.3s;
    }



#logout{
position: absolute;
right: 29px;
top: 25px;


}



.conteiner-titulo h1 {
font-size: 16px;
font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

}



/* Conteiner Menu-Pesquisa-Conteudo */
.conteiner-menu-pesquisa-conteudo {
display: flex;
flex-direction: row; /* um do lado do outro */
justify-content: center;
height: 92%;
width: 100%;



}

#menu-tabela{
display: flex;
width: 100%;
height: 90%;
flex-direction: row;
}




/* Menu Lateral Esquerdo*/
#menu-esquerdo {
display: flex;
flex-direction: column;
width: 18%;
height: 100%;
text-align: center;
border: 1px solid black;
border-top: none;
background-color: var(--subtitulos);



}



.h1-menu {
margin-top: 0px;
width: 100%;
font-size: 20px;
background-color: var(--titulos);
text-align: center;

}

a {
display: flex;
justify-content: center;
align-items: center;
text-decoration: none;
width: 100%;
padding-bottom: 3px;
padding-top: 3px;
font-size: 16px;
color: white;
font-family: Arial, Helvetica, sans-serif;
border-bottom: solid 1px rgba(0, 0, 0, 0.529);

}

#menu-esquerdo a:hover {
color: black;
background-color: white;
transition: 0.3s;
}





/* Conteiner-Pesquisa-Conteudo */






input {
font-size: 18px;
width: 20%;
height: 75%;
margin-right: 10px;
border-radius: 5px;

}

/* Tabela*/
.conteiner-tabela {
display: flex;
flex-direction: column;
border: 1px solid black;
width: 100%;
height: 98%;
background-color: white;
border: 1px solid black;
overflow: auto;
margin-left: 5px;

}

#menutabela-barra{
display: flex;
width: 100%;
height: 100%;
flex-direction: column;

}



/* FIM TABELA */

.barrainferior {
display: flex;
width: 100%;
height: 10%;
border: 1px solid black;
background-color: var(--titulos);
align-items: center;
justify-content: center;
font-size: 15px;
color: white;
border-radius: 0px 0px 10px  10px;


}


@media(max-width: 640px){
    .conteiner-geral{
        height: 90vh;
    }


#menu-esquerdo{
    display: none;
    flex-direction: row;
    width: 100%;
    height: 10%;
    align-items: center;

   
}

.sumir{
    display: none;
}




#menu-tabela{
    flex-direction: column;
    
    
}

.conteiner-tabela{
    width: 100%;
    height: 100%;
    margin-left: 0px;
}

.h1-menu{
    display: none;
}

a{
    border-bottom: none;
    border-right: 1px solid black;
    
}


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
                        <a href="/relatorio">Resumo</a>
                        <a href="/indexcaixa">Caixa</a>
                        <a href="/user/profile">Usuarios</a>
                        <a href="/cadastro/login/novo">Novo Usuario</a>
                        <a id="logoff" href="/logout"><img  src="{{ asset('\sair.png') }}" alt="">&nbspLogout</a>
                    </div>
                    <div class="conteiner-tabela">
                        @yield('conteudo')
                    </div>
                </div>


                <div class="barrainferior">Usuário:&nbsp<span>{{ Auth::User()->user }}</span></div>
            </div>

        </main>

    </div>








</body>

</html>