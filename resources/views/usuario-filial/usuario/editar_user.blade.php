<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Novo Usuario</title>
  <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
  <link href="{{ asset('css/usuario-filial.css') }}" rel="stylesheet">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-box">
  <h2>Edição de Usuario</h2>
  <form action="/editar/user" method="post" >
  @csrf
    <div class="user-box">
      <input type="text" name="nome" required="" value="{{ old('nome', $user_editar->nome) }}">
      <label>Nome:</label>
    </div>
    <div class="user-box">
      <input type="text" name="email" required="" value="{{ old('email', $user_editar->email) }}">
      <label>Email:</label>
      @error('email')
        <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
        @enderror
    </div>
    <div class="user-box">
      <input type="hidden" name="user_id" id="user_id" value="{{$user_editar->id}}">
    </div>

    <div style="color: white;">
    @foreach ($empresas as $empresa)
    <input type="checkbox" name="empresas[]" value="{{ $empresa->id }}" id="empresa_{{ $empresa->id }}"
    {{ in_array($empresa->id, old('empresas', $empresasSelecionadas)) ? 'checked' : '' }}>
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


  
</body>
</html>
