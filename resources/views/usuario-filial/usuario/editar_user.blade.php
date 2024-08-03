<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Novo Usuario</title>
  <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
  <style>
    html {
      height: 100%;
    }

    body {
      margin: 0;
      padding: 0;
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
      background: rgba(0, 0, 0, .5);
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
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
      top: 0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      pointer-events: none;
      transition: .5s;
    }

    .login-box .user-box input:focus~label,
    .login-box .user-box input:valid~label {
      top: -20px;
      left: 0;
      color: #03e9f4;
      font-size: 12px;
    }



    #login {
      display: flex;
      width: 100%;
      height: 100px;
      justify-content: space-around;
      align-items: center;

    }



    @media(max-width: 1000px) {

      .login-box {
        transform: scale(2.3);
        top: 40%;
        left: 30%;
      }

    }

    button, a {
      all: unset;
      border: 1px solid rgba(255, 255, 255, 0.503);
      padding: 08px 20px;
      color: white;
      border-radius: 10px;
      font-size: 14px;
    }


    button:hover, a:hover {
      background-color: #03e9f4;
      color: black;
      transition: 0.6s;
    }

    #alinhar {
      display: flex;
      width: 100%;
      justify-content: space-around;

    }

  </style>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-box">
  <h2>Adicionando Conta</h2>
  <form action="/editar/user" method="post" >
  @csrf
    <div class="user-box">
      <input type="text" name="user" required="" value="{{ isset($user_editar->nome) ? $user_editar->nome : '' }}">
      <label>Nome:</label>
    </div>
    <div class="user-box">
      <input type="text" name="email" required="" value="{{ isset($user_editar->email) ? $user_editar->email : '' }}">
      <label>Email:</label>
    </div>
    <div class="user-box">


      <input type="hidden" name="user_id" id="user_id" value="{{$user_editar->id}}">
    </div>

    <div style="color: white;">
    @foreach ($empresas as $empresa)
    <input type="checkbox" name="empresas[]" value="{{ $empresa->id }}" id="empresa_{{ $empresa->id }}"
    {{ in_array($empresa->id, $empresasSelecionadas) ? 'checked' : '' }}>
    <label for="empresa_{{ $empresa->razao }}">{{ $empresa->razao }}</label>
@endforeach

</div>
<br>
<div id="alinhar">
        <button type="submit">Atualizar</button>
        <a href="/user/profile">Voltar</a>
      </div>


  </form>
  
</div>

@if (Session::has('falha'))
    <div style="color:red" class="msg">
        <p>{{ Session::get('falha') }}</p>
    </div>
    {{ Session::forget('falha') }}
@endif
  
</body>
</html>
