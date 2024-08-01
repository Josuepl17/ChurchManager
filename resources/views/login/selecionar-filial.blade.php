<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Faça Login</title>
  <link rel="shortcut icon" href="icone.ico" type="image/x-icon">

  <style>
    html {
  height: 100%;
}

body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#141e30, #243b55);
  box-sizing: border-box;
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 600px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;


}





@media(max-width: 1000px){

  .login-box {
  transform: scale(1.5);
  top: 30%;
  left: 17%;
}

}

th, td {
  color: white;
  text-align: center;
  border: 1px solid white;
  padding: 5px;

}



td{
  background-color: white;
  color: black;
}

.tda:hover{
  background: green;
  transition: 0.6s;

}

.tda{
    width: 10%;
    background: rgba(0, 128, 0, 0.577);
}

a:hover{
  color: white;

}

td a{
  text-decoration: none;
  color: white;
  display: block;
  width: 100%;
  height: 100%;
}

table{
  border-collapse: collapse;
  width: 100%;
}

#cadastro{
  width: 100%;
  display: flex;
  justify-content: flex-end;
}

button a{
color: blue;
text-decoration: none;
color: black;
}

button a:hover {
color: blue;

}


  </style>


</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-box">

<table>
    <tr>
        <th>ID</th>
        <th>EMPRESA</th>
        <th>SELECIONAR</th>
    </tr>
    @foreach ($empresas as $empresa)
    <tr>
        <td>{{ $empresa->id }}</td>
        <td>{{ $empresa->razao }}</td>
        <td class="tda" >
            <a href="/entrar/{{ $empresa->id }}">Entrar</a>
        </td>
    </tr>
    @endforeach

</table>
<br>
@admin
<div id="cadastro" ><button><a href="/cadastrar/empresas">Cadastro Nova Filial</a></button></div>
<br>
@endadmin
<div id="cadastro" ><button><a href="/">Voltar</a></button></div>


</div>
<!-- partial -->

</body>
</html>
