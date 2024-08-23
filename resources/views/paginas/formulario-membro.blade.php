@extends('components.layout')
@section('aba-navegador', 'Formulario' )
@section('titulo-pagina', 'Formulario de Cadastro' )
@section('conteudo')

<style>

    
        /* Estilos para o formulário */
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 55%;
           height: 90%;
           border: 1px solid black;
           border-radius: 10px;
           background-color: white;
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
            background-color: rgb(0, 0, 66);
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
                width: 97%;
                 height: 69%;
            }
        }
    </style>


<div class="conteudo" >
    <form action="/inserir/membro" method="post">
        @csrf
        
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
    
        <input  type="number" name="telefone" id="telefone" autocomplete="off" required maxlength="11" placeholder="Telefone:"  >
    
        <button  type="submit">Cadastrar</button>
    </form>
</div>



<script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.links-1');
            links.forEach(link => {
                link.style.backgroundColor = 'rgb(228, 228, 228)';
                link.style.color = 'black';
            });
        });
    </script>

@endsection

