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

  <form action="/confirma/codigo" method="post" >

  @csrf
    <div  class="user-box">
      <input autocomplete="off" type="number" name="codigo" required="" value="{{ old('codigo')}}" >
      <label >Codigo Enviado:</label>
      @error('codigo')
                <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
                @enderror
    </div>


  
<div id="alinhar-esquerda" >
<button type="submit">Confirmar Codigo</button>
</div>
  </form>

  </div>
<br>

</body>
</html>
