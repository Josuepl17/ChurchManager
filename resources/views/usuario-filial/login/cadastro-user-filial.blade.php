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
        <input type="text" name="nome" required="" value="{{ old('nome') }}">
        <label>Nome:</label>
      </div>

      <div class="user-box">
        <input type="text" name="email" id="email" required="" value="{{ old('email') }}">
        <label>Email:</label>
        @error('email')
        <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
            @enderror
      </div>

      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Senha:</label>
        @error('password')
        <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
            @enderror
      </div>

      <div class="user-box">
        <input type="text" name="razao" required="" value="{{ old('razao') }}">
        <label>Razão Social:</label>
      </div>
      
      <div class="user-box">
        <input type="number" name="cnpj" required="" value="{{ old('cnpj') }}">
        <label>CNPJ:</label>
        @error('cnpj')
        <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
            @enderror
      </div>

      <div id="alinhar-esquerda">
        <button type="submit">Cadastrar</button>

      </div>
    </form>

  </div>



</body>

</html>