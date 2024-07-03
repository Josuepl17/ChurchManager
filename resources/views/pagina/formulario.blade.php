@extends('components.layout')

@section('conteudo')




<style>

    
        /* Estilos para o formulário */
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 55%;
           height: 70%;
           border: 1px solid black;
           border-radius: 10px;
        }
        input, button {
            display: flex;
          width: 80%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            text-transform: uppercase;
        }
        button {
            background-color: blue;
            color: #fff;
            cursor: pointer;
            
        }

        .conteudo{
            display: flex;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        @media (max-width: 700px) {
            form{
                width: 75%;
                 height: 85%;
            }
        }
    </style>


<div class="conteudo" >
    <form action="/inserir/membro" method="post">
        @csrf
        <h2>Formulario de Cadastro</h2>
        <br>
        <input  type="text" name="nome" id="nome" autocomplete="off" required placeholder="Nome:">
    
        <input type="text" name="sobrenome" id="sobrenome" autocomplete="off" required placeholder="Sobrenome:" >
    
        <input type="text" list="funcao" name="funcao" placeholder="Função" placeholder="Função" >
        <datalist id="funcao">
            <option value="MEMBRO">
            <option value="MUSICO">
            <option value="PASTOR">
            <option value="OBREIRO">
        </datalist>
    
    
        <input  type="text" name="endereco" id="endereco" autocomplete="off" required maxlength="30" placeholder="Endereço:" >
    
        <input  type="number" name="telefone" id="telefone" autocomplete="off" required maxlength="10" placeholder="Telefone:" >
    
        <button  type="submit">Cadastrar</button>
    </form>
</div>


@endsection