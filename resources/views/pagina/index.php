<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .troywell-avia{
            border: none;
        }
        .troywell-caa{
            border: none;
        }

        h1{
            font-family: 'Times New Roman', Times, serif;
            color: white;
        }

        body{
            background-color: black;
        }



        .titulo{
            display: flex;
            border: 1px solid black;
            justify-content: center;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
            background-color: #025951;
            border-radius: 10px 10px 0px 0px;

        }
        .nav{
            display: flex;
            flex-direction: column;
            width: 20%;
            height: 100%;
            text-align: center;
            justify-content: flex-start;
            margin-right: 10px;
            border: 1px solid black;
            background-color: #177373;
            
            
            
        }

        a{
            
            text-decoration: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            width: 100%;
            padding-top: 6px;
            padding-bottom: 6px;
            font-size: 25px;
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            
        }

        a:hover{
            color: black;
            background-color: white;
            transition: 0.3s;
        }
        
        main{
            display: flex;
            margin-left: 10px;
            margin-right: 10px;
            justify-content: center;
            height: 100%;
           

        }

        .navtable{
            
            flex-wrap: wrap;
            width: 100%;
            height: 100%;
            border: 1px solid black;
            justify-content: center;
        }

        .pesquisa{
            display: flex;
            height: 5%;
            width: 100%;
            justify-content: flex-end;
            background-color: #177373;
            border: 1px solid black;
            
            
        }

        input{
            font-size: 25px;
            width: 20%;
            margin-top: 2px;
            height: 75%;
          margin-right: 10px;
          border-radius: 10px;
            
        }

        .tabela{ 
            
            border: 1px solid black;
            width: 100%;
            height: 94.5%;
            background-color: white;     
            border: 1px solid black;
            font-size: 25px;

        }

            
    
       

        table{
            border-collapse: collapse;
            margin: auto;
            border-radius: 50px;
            width: 100%;
            background-color: white;
            margin-top: -2px;
            color: black;
            
            
            
          
        }





        td{
            
            border: 1px solid black;
            text-align: center;
            
            font-size: 25px;
            
 }


        .conteiner{
            margin: auto;
            height: 850px;
            width: 98%;
        }

        th{
            border: 1px solid black;
            font-size: 25px;
            color: white;
            background-color: #025951;
      
           
            
           
        }
        
        tr:hover{
            background-color: #177373;
            color: white;
        }

        td:hover{
            color: white;
        }

        .menu{
            margin-top: 0px;
            width: 100%;
            border: 1px solid black;
            background-color: #025951;
            
        }
    






        </style>

</head>

<body>
    <div class="conteiner">
        <div class="titulo">
            <h1>Igreja Prebiteriana da Renovação</h1>
        </div>
        <main>
            <div class="nav">
                <h1 class="menu" >Menu</h1>
                <a href="#">Cadastro Membro</a>
                <a href="#">Cadastro Dizimo</a>
                <a href="#">Cadastro Oferta</a>
                <a href="#">Cadastro Despesas</a>
            </div>
            <div class="navtable">
        
                <div class="pesquisa">
        
                <input type="text" placeholder="Pesquisar">
                </div>
                <div class="tabela">
                <table>
                        
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>FUNÇÃO</th>
                                <th>ENDEREÇO</th>
                                <th>TELEFONE</th>
                                <th>BOTOES</th>
                            </tr>
                      
                        <tr>
                            <td>1</td>
                            <td>CELI</td>
                            <td>MUSICO</td>
                            <td>MUTUM</td>
                            <td>279965590967</td>
                            <td><button><a href="wwww.COM.BR"></a>APAGAR</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>OSVALDO</td>
                            <td>MUSICO</td>
                            <td>MUTUM</td>
                            <td>279965590967</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>VITORIA</td>
                            <td>MUSICO</td>
                            <td>MUTUM</td>
                            <td>279965590967</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>MARIA</td>
                            <td>MUSICO</td>
                            <td>MUTUM</td>
                            <td>279965590967</td>
                        </tr>


                </table>
                </div>
            </div>
        
        </main>
    </div>



    
</body>
</html>