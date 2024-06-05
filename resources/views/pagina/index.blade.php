
@extends('components.layout')

@section('conteudo')  
@section('titulo', $razao_empresa )
@section('titulo-nav', $razao_empresa )
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
            font-size: 16px;

        }


        td:hover {
            color: white;
        }




        th {
            border: 1px solid black;
            font-size: 16px;
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
            font-size: 16px;
            height: 100%;
            width: 100%;
            color: white;



        }

        .inserir {
            margin: auto;
            background-color: rgb(0, 48, 0);
            font-size: 16px;
            color: white;
            height: 100%;
            width: 100%;
            
        }

        .filtro{
            display: flex;
            width: 100%;
            height: 7%;
            justify-content: flex-end;
            align-items: center;
            background-color: var(--titulos);
        }

        #nav{
            margin: 0px;
            padding: 0px;
           display: flex;
           justify-content: flex-end;
           align-items: center;
        }
        .conteudo {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 490px;
        overflow: auto;
    }
    .barra{
        display: flex;
        width: 100%;
        height: 04%;
        background-color: var(--titulos);
    }



    @media(max-width: 640px){

        #nav{
            display: none;
        }

        }
    </style>


    <div class="filtro">
        <a style="width: 20%; " href="/cadastro/membro"><button style="font-size: 15px; " >Cadastrar Membro</button></a>
<form  id="nav" style="margin: 0px;" action="/" method="get">
    <input style="width: 100%;" type="search" name="pesquisa" id="pesquisa" value="{{ isset($dados) ? $dados : '' }}" >
    <input  style="font-size: 15px; width:25%" type="submit" value="Buscar">
</form>
    </div>   
        
 

    <div class="conteudo">
        <table>
            <tr>
                <th class="sumir">ID</th>
                <th style="width: 20%;" >NOME</th>
                <th class="sumir">ENDEREÇO</th>
                <th>FUNÇÃO</th>
                <th>TELEFONE</th>
                <th class="sumir" style="width: 08%;">X</th>
                <th  style="width: 4%;">X</th>
            </tr>
            @foreach ($index as $ind)
            <tr>
                <td class="sumir" style="background-color:#0A1626 ; color:white">{{ $ind->id }}</td>
                <td>{{ $ind->nome }}</td>
                <td class="sumir" >{{ $ind->endereco }}</td>
                <td>{{ $ind->funcao }}</td>
                <td>{{ $ind->telefone }}</td>
                <td class="sumir" >
                    <form class="formx" action="/inserir/dizimos/{{ $ind->id }}/{{ $ind->nome }}"><button class="inserir">Inserir</button></form>
                </td>
                <td >
                    <form action="/destroy/{{$ind->id}}" method="post"><button class="excluir">X</button>
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </table>


    </div>

    <div class="barra">

</div>



@endsection
