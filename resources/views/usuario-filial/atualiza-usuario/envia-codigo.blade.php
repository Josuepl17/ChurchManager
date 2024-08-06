<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Faça Login</title>
  <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
  <link href="{{ asset('css/usuario-filial.css') }}" rel="stylesheet">
  

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-box">
  <h2>Recupere Sua Senha</h2>

  <form action="/recupere/senha" method="post" >

  @csrf
    <div  class="user-box">
      <input autocomplete="off" type="text" name="email" required="" value="{{ old('email')}}">
      <label >Email:</label>
      @error('email')
                <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
                @enderror
    </div>


  
<div id="alinhar-esquerda" >
<button type="submit">Enviar Codigo</button>
</div>
  </form>

  </div>
<br>

</body>
</html>
