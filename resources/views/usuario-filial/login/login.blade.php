<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Faça Login</title>
  <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
  <link href="{{ asset('css/usuario-filial.css') }}" rel="stylesheet">
  <style>



    #cadastre-se {
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


    #cadastre-se:hover {

      background-color: #03e9f4;
      color: black;
      transition: 0.6s;
    }
  </style>


</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="login-box">
    <h2>Entre</h2>

    <form action="/login/if" method="post">

      @csrf
      <div class="user-box">
        <input autocomplete="off" type="text" name="email" required="">
        <label>Nome:</label>
      </div>
      <div class="user-box">
        <input autocomplete="off" type="password" name="password" required="">
        <label>Senha:</label>
        <span>
      </div>


      <div id="alinhar">
        <button type="submit">Login</button>
        <a href="/esqueci/senha">Esqueci Minha Senha</a>
      </div>

    </form>
    @if (Session::has('falha'))

    <p style="color: red;">{{ Session::get('falha') }}</p>
    {{ Session::forget('falha') }}

    @endif
  </div>
  <br>

  <a id="cadastre-se" style="text-decoration: none;" href="/cadastro/login">Cadastrar-se</a>
</body>
TODO: UPDATE
</html>