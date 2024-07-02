@extends('components.layout')
@section('tela', 'Membros' )
@section('usuario', $razao_empresa )
@section('nome_igreja', $razao_empresa )

<style>
    :root {
        --titulos: #0A1626;
        --subtitulos: #023859;
        --fundos: #0D8AA6;

        --cor-secundaria: #313131e7;
    }


    .conteudo {
        font-size: 14px;
        width: 100%; 
        border-collapse: collapse;
        background-color: white;
    }

    .conteudo th, .conteudo td {
        padding: 5px;
        
        border: 1px solid #ddd;
        text-align: center;
    }



    .conteudo th{
        background-color: var(--titulos);
        color: white;    
    }

    .conteudo tr:first-child{
        position: sticky;
        top: 0;

    }

    button{
        all: unset;
    }







    @media (max-width: 1300px) {
           .menor{
            width: 90%;
        }

            #conteiner-subtable a{
        padding: 2px;
                }


    } 

</style>

@section('botao-tabela')

<a href="/cadastro/membro"><button style="padding: 4px;" >Inserir</button></a>
<form action="/" method="get">
    <input class="menor"  type="search" name="pesquisa" value="{{ isset($dados) ? $dados : '' }}">
    <input  type="submit" value="Buscar">
</form>

@endsection

@section('conteudo')


    <table class="conteudo" >
        <tr>
            <th class="remover" >ID</th>
            <th>NOME</th>
           <th class="remover" >ENDEREÇO</th> 
            <th  >FUNÇÃO</th>
           <th>TELEFONE</th> 
            <th  >X</th>
            <th >X</th>
        </tr>
        @foreach ($index as $ind)
        <tr>
            <td class="remover" style="background-color:#0A1626 ; color:white">{{ $ind->id }}</td>
            <td>{{ $ind->nome }}</td>
            <td class="remover" >{{ $ind->endereco }}</td> 
            <td  >{{ $ind->funcao }}</td>
            <td  >{{ $ind->telefone }}</td> 
            <td style="background-color: green;" >
                <a style="color: white; font-size:15px; text-decoration: none;" href="/inserir/dizimos/{{ $ind->id }}/{{ $ind->nome }}">Inserir</a>
            </td>
            <td style="background-color: red;" >
<button>X</button>
            </td>
        </tr>
        @endforeach
    </table>
    


@endsection