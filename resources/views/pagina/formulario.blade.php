<x-layout>

<style>
        .geral{
            display: flex;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            
            
        }

    form{
            display: flex;
            flex-direction: column;
            width: 50%;
            height: 90%;
            padding-bottom: 5px;
            border: 3px solid black;
            align-items: center;
            
           
           
        }

        label{
            font-size: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            padding-bottom: 5px;
            
        }



        .cad{
            width: 60%;
            height: 5%;
            text-transform: uppercase;
            font-size: 20px;
            padding: 2px;
            border: 3px solid black;
            text-align: center;
            
            
        }

        .h1m{
            color: black;
            font-size: 30px;
        }

        .btn{
            margin-top: 10px;
            color: black;
            text-decoration: none;
            margin-top: 10px;
            padding-bottom: 0;
            font-size: 18px;
            width: 190px;
            height: 40px;
            border: 3px solid black;
            background-color: #177373;
            color: white;
            margin-bottom: 9px;
            
           
           
        }

        .btn:hover{
            background-color: #025951;
            color: white;
            border: 1px solid black;
            transition: 0.6s;
            
        }

</style>

<div class="geral">
    <form action="/inserir/membro" method="post">
    @csrf
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
    
    
            <button class="btn" type="submit">Enviar</button>
    </form>
</div>

</x-layout>