<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>

.conteiner{
  display: flex;
  height: 100vh;
  
  align-items: center;
  justify-content: center;
  
} 

form{
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;

  width: 600px ;
  height: 300px;
  border: 1px solid black;
  border-radius: 10px;
}

h2{
  margin-top: -15px;
  font-size: 30px;
}

.sub{
  margin-top: 12px;
  font-size: 20px;
}

input{
  font-size: 25px;
}

  </style>
</head>
<body>
  
<div class="conteiner" >

<form action="/cadastro/user" method="post">
<h2>Cadastro User</h2>
@csrf
<label for="user">User</label>
<input type="text" name="user" id="user" >
<br>
<br>
<label for="password">SENHA</label>
<input type="password" name="password" id="password">
<input class="sub" type="submit" value="Enviar">

</form>

</div>



</body>
</html>