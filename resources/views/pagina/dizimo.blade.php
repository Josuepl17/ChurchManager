<x-layout>

<style>
    .table2{
            display: flex;
            width: 100%;
            height: 55%;
            border: 1px solid black;
            border-bottom: #025951 5px solid;
            overflow: auto;
            
            
        }

        .id{
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

        .id button{
            margin: 0px;
            color: black;
            text-decoration: none;
            
            padding-bottom: 0;
            font-size: 30px;
            width: 300px;
            height: 50px;
            border: 3px solid black;
            background-color: #177373;
            color: white;
           
           
        }

        .id button:hover{
            background-color: #025951;
            color: white;
            
            transition: 0.6s;
            
        }

        .excluir {
            margin: auto;
            background-color: red;
            font-size: 20px;
            height: 100%;
            width: 40%;
            margin-top: -2px;
            
           
        }


        .excluir:hover {
            color: aliceblue;
            
            background-color: red;
            transition: 0.6;
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

            border: 1px solid black;
            text-align: center;
            font-size: 25px;
            margin-top: 0px;
            margin-bottom: 0px;
        }


        td:hover {
            color: white;
        }




        th {
            border: 1px solid black;
            font-size: 25px;
            color: white;
            background-color: #025951;
            position: sticky;
            top: -1px;
            padding-top: 5px;

        }

        tr:hover {
            background-color: #177373;
            color: white;
        }



        .formx{

            display: flex;
            width: 100%;
            flex-direction: none;
            align-items: none;
            margin-top: none;
            justify-content: none;
            
        
            
        }
</style>
<div class="table2">
                    <table>

                    <tr>
                            <th>ID</th>
                            <th>DATA</th>
                            <th>VALOR</th>
                            <th>X</th>

                            
                        </tr>
                        @foreach ($dizimos as $dizimo)


                        <tr>
                            <td>{{$dizimo->id}}</td>
                            <td>{{$dizimo->data}}</td>
                            <td>{{$dizimo->valor}}</td>

                            <td ><form class="formx" action="/destroy/dizimos/{{$dizimo->id}}/{{$dizimo->user_id}}"><button class="excluir">X</button></form></td>
                        </tr>

                    @endforeach
                   
                  </table>


                </div>


                <form class="id" action="/registrar/dizimo" method="get">

 <input type="hidden" name="user_id" value="{{ $user_id }}">               
<label for="data">Data Conferencia:</label>
<input class="cad" type="date" name="data" id="data" autocomplete="off" required>

<label for="valor">Valor:</label>
<input class="cad" type="text" name="valor" id="valor" autocomplete="off" required>


<br>
<br>


    <button type="submit">Registar Dizimo</button>
</form>
</x-layout>