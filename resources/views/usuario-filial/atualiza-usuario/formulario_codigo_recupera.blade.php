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

  <form action="/confirma/codigo" method="get" >

  @csrf
    <div  class="user-box">
      <input autocomplete="off" type="number" name="codigo" required="">
      <input autocomplete="off" type="hidden" name="codigo_email" required="" value="{{$codigo}}">
      <input autocomplete="off" type="hidden" name="usuario" required="" value="{{$user_id}}">
      <label >Codigo Enviado:</label>
    </div>


  
<div id="alinhar-esquerda" >
<button type="submit">Confirmar Codigo</button>
</div>
  </form>
  @if (Session::has('falha'))

<p style="color: red;" >{{ Session::get('falha') }}</p>
{{ Session::forget('falha') }}

@endif
  </div>
<br>

</body>
</html>
