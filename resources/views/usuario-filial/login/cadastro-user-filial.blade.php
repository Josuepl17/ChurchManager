<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Novo Cadastro</title>
  <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
  <link href="{{ asset('css/usuario-filial.css') }}" rel="stylesheet">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="login-box">
    <h2>Crie Sua Conta</h2>
    <form action="/cadastro/usuario" method="post">
      @csrf

      <div class="user-box">
        <input type="text" name="nome" required="" value="{{ isset($dados->user) ? $dados->user : '' }}">
        <label>Nome:</label>
      </div>
      <div class="user-box">
        <input type="text" name="email" required="" value="{{ isset($dados->email) ? $dados->email : '' }}">
        <label>Email:</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Senha:</label>
      </div>
      <div class="user-box">
        <input type="text" name="razao" required="" value="{{ isset($dados->razao) ? $dados->razao : '' }}">
        <label>Razão Social:</label>
      </div>
      <div class="user-box">
        <input type="number" name="cnpj" maxlength="2" required="" value="{{ isset($dados->cnpj) ? $dados->cnpj : '' }}">
        <label>CNPJ:</label>
      </div>

      @if (Session::has('falha'))
    <div>
        <p style="color:red;" >{{ Session::get('falha') }}</p>
    </div>
    {{ Session::forget('falha') }}
@endif

<div id="alinhar-esquerda" >
<button type="submit">Cadastrar</button>

</div>
    </form>

  </div>



</body>

</html>