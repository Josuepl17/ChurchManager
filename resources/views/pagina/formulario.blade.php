<x-layout>

<style>
    form{
            display: flex;
            flex-direction: column;
            
            
            
            align-items: center;
            margin-top: 20px;
            justify-content: space-between;
           
        }

        label{
            font-size: 40px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            padding: 10px;
            
        }



        .cad{
            width: 40%;
            text-transform: uppercase;
            font-size: 30px;
            padding: 2px;
            border: 3px solid black;
            text-align: center;
            
            
        }

        .h1m{
            color: black;
            font-size: 50px;
        }

        .btn{
            margin-top: 10px;
            color: black;
            text-decoration: none;
            margin-top: 10px;
            padding-bottom: 0;
            font-size: 30px;
            width: 300px;
            height: 50px;
            border: 3px solid black;
            background-color: #177373;
            color: white;
           
           
        }

        .btn:hover{
            background-color: #025951;
            color: white;
            border: 1px solid black;
            transition: 0.6s;
            
        }

</style>

<form action="/create" method="get">

<h1 class="h1m">Cadastro de Membros</h1>
    <label for="nome">Nome:</label>
    <input class="cad" type="text" name="nome" id="nome" autocomplete="off" required>

   <label for="funcao">Função</label>
   <input class="cad" type="text" name="funcao" id="funcao" autocomplete="off" required>

    <label for="endereco">Endereço:</label>
    <input class="cad" type="text" name="endereco" id="endereco" autocomplete="off" required>

    <label for="telefone">Telefone:</label>
    <input class="cad" type="number" name="telefone" id="telefone" autocomplete="off" required>
    <br>
    <br>


        <button class="btn" type="submit">Enviar</button>
</form>

</x-layout>