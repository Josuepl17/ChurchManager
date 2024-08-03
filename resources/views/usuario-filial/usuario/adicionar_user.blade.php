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
        <input type="text" name="user" required="" value="{{ isset($user_editar->nome) ? $user_editar->nome : '' }}">
        <label>Nome:</label>
      </div>
      <div class="user-box">
        <input type="text" name="email" required="" value="{{ isset($user_editar->email) ? $user_editar->email : '' }}">
        <label>Email:</label>

      </div>
      <div class="user-box">
        <input type="password" name="password" required="" value="{{ isset($user_editar->password) ? $user_editar->password : '' }}">

        <label>Senha</label>

      </div>

      @if (Session::has('falha'))
      <div>
        <p style="color:red;">{{ Session::get('falha') }}</p>
      </div>
      {{ Session::forget('falha') }}
      @endif

      <div style="color: white;">
        @foreach($empresas as $empresa)
        <input type="checkbox" name="empresas[]" value="{{ $empresa->id }}" id="empresa_{{ $empresa->id }}">
        <label for="empresa_{{ $empresa->razao }}">{{ $empresa->razao }}</label>
        @endforeach

        @error('empresas')
        <div>
          <p style="color: red;">{{ $message }}</p>
        </div>
        @enderror
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