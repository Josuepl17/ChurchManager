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

<script>
document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementsByTagName("form")[0];
    var loader = document.getElementById("loader");

    form.addEventListener("submit", function() {
        loader.style.display = "block";
    });

    window.addEventListener("pageshow", function(event) {
        if (event.persisted) {
            loader.style.display = "none";
        }
    });
});

</script>

<svg id="loader" style="display: none; position: fixed; bottom: 10px; right: 10px;  z-index: 9999;" viewBox="25 25 50 50">
  <circle  r="20" cy="50" cx="50"></circle>
</svg>

<style>
  /* From Uiverse.io by barisdogansutcu */ 
svg {
 width: 3.25em;
 transform-origin: center;
 animation: rotate4 2s linear infinite;
}

circle {
 fill: none;
 stroke: hsl(214, 97%, 59%);
 stroke-width: 3;
 stroke-dasharray: 1, 200;
 stroke-dashoffset: 0;
 stroke-linecap: round;
 animation: dash4 1.5s ease-in-out infinite;
}

@keyframes rotate4 {
 100% {
  transform: rotate(360deg);
 }
}

@keyframes dash4 {
 0% {
  stroke-dasharray: 1, 200;
  stroke-dashoffset: 0;
 }

 50% {
  stroke-dasharray: 90, 200;
  stroke-dashoffset: -35px;
 }

 100% {
  stroke-dashoffset: -125px;
 }
}

</style>

</html>