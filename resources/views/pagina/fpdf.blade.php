<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
        }
        
        .conteiner{
            display: flex;
            margin: auto;
            width: 50%;
            justify-content: center;
        }

        table {
            border-collapse: collapse;



            margin: auto;
            
            width: 100%;
            background-color: white;
            margin-top: 0px;
            color: black;

        }

        td {

border: 1px solid rgba(0, 0, 0, 0.34);
text-align: center;
font-size: 18px;
margin-top: 0px;
margin-bottom: 0px;
}

th {
            border: 1px solid black;
            font-size: 20px;
            color: rgb(0, 0, 0);
            background-color: var(--subtitulos);
           
            top: -1px;
            padding-top: 5px;

        }

    </style>
</head>
<body>
    <h1>Relatorio Mensal Dizimos</h1>
        <hr>

        <div class="conteiner" >
     

        <table>



            <tr>
                <th>ID</th>
                
                <th>DATA</th>
                <th>VALOR</th>
               


            </tr>

   
            @foreach ($dizimos as $dizimo)
            

            <tr>
                <td>{{ $dizimo->id}}</td>
                
                
                <td>{{$dizimo->data}}</td>
                <td>R${{$dizimo->valor}}</td>


            </tr>

           
           
            @endforeach

            <tr>
                <td>TOTAL:</td>
            </tr>

        </table>
        </div>

</body>
</html>