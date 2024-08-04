<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Novo Usuario</title>
  <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
  <link href="{{ asset('css/usuario-filial.css') }}" rel="stylesheet">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="login-box">
    <h2>Adicionando Usuario</h2>
    <form action="/cadastro/user/adicionar" method="post">
      @csrf
      <div class="user-box">
        <input type="text" name="user" required="" value="{{ old('user') }}">
        <label>Nome:</label>
      </div>

      <div class="user-box">
        <input type="text" name="email" required="" value="{{ old('email') }}">
        <label>Email:</label>
        @error('email')
        <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
        @enderror
      </div>


      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Senha</label>
        @error('password')
        <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
        @enderror
      </div>


      <div style="color: white;">
        @foreach($empresas as $empresa)
        <input type="checkbox" name="empresas[]" value="{{ $empresa->id }}" id="empresa_{{ $empresa->id }}" {{ in_array($empresa->id, old('empresas', [])) ? 'checked' : '' }}>
        <label for="empresa_{{ $empresa->razao }}">{{ $empresa->razao }}</label>
        @endforeach


      </div>
      <br>
      <div id="alinhar">
        <button type="submit">Cadastrar</button>
        <a href="/user/profile">Voltar</a>
      </div>



    </form>
  </div>



</body>

</html>