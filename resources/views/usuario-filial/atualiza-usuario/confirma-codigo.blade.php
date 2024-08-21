<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Confirme seu Codigo</title>
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
