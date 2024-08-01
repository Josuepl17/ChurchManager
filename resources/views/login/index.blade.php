<!DOCTYPE html>
<html lang="en" >
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
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
  
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}

.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}



#login{
  display: flex;
  width: 100%;
  height: 100px;
  justify-content: space-around;
  align-items: center;
  
}



@media(max-width: 1000px){

  .login-box {
  transform: scale(2.3);
  top: 40%;
  left: 30%;
}

}

button{
  all: unset;
  border: 1px solid rgba(255, 255, 255, 0.503);
  padding: 08px 20px;
  color: white;
  border-radius: 10px;
  font-size: 14px;
}

button:hover{
  
  background-color: #03e9f4;
  color: black;
  transition: 0.6s;
}

#alinhar-esquerda{
  display: flex;
  width: 100%;
  justify-content: space-around;
  
}

#cadastre-se{
  all: unset;
  position: absolute;
  right: 20px;
  top: 20px;
  border: 1px solid rgba(255, 255, 255, 0.503);
  padding: 08px 20px;
  color: white;
  border-radius: 10px;
  font-size: 16px;
  background-color: #141e30;
}

#cadastre-se:hover{

  background-color: #03e9f4;
  color: black;
  transition: 0.6s;
}




  </style>
  

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-box">
  <h2>Login</h2>

  <form action="/login/if" method="post" >

  @csrf
    <div  class="user-box">
      <input autocomplete="off" type="text" name="email" required="">
      <label >Nome:</label>
    </div>
    <div class="user-box">
      <input autocomplete="off" type="password" name="password" required="">
      <label>Senha:</label>
      <span>
      </div>

  
<div id="alinhar-esquerda" >
<button type="submit">Login</button>
<button><a style="all: unset;" href="">Esqueci Minha Senha</a></button>
</div>
  </form>

  </div>
<br>


<!-- partial -->
@if (Session::has('falha'))

<p style="color: red;" >{{ Session::get('falha') }}</p>
{{ Session::forget('falha') }}

@endif

<a id="cadastre-se" style="text-decoration: none;" href="/cadastro/login">Cadastrar-se</a>
</body>
</html>
