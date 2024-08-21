<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Faça Login</title>
  <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
  <link href="{{ asset('css/usuario-filial.css') }}" rel="stylesheet">
  <style>



    #cadastre-se {
      position: absolute;
      right: 20px;
      top: 20px;
      border: 1px solid rgba(255, 255, 255, 0.503);
      padding: 08px 20px;
      color: white;
      border-radius: 10px;
      font-size: 16px;
      background-color: #141e30;
      
    }


    #cadastre-se:hover {

      background-color: #03e9f4;
      color: black;
      transition: 0.6s;
    }
  </style>


</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="login-box">
    <h2>Entre</h2>

    <form  action="/login/if" method="post">

      @csrf
      <div class="user-box">
        <input autocomplete="off" type="text" name="email" required="" value="{{old('email')}}" >
        <label>Nome:</label>
        @error('email')
        <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
            @enderror
      </div>
      <div class="user-box">
        <input autocomplete="off" type="password" name="password" required="">
        <label>Senha:</label>
        @error('password')
        <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
            @enderror
            @error('login')
            <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
                @enderror
        <span>
      </div>


      <div id="alinhar">
        <button type="submit">Login</button>
        <a href="/esqueci/senha">Esqueci Minha Senha</a>
      </div>

    </form>



  </div>
  <br>

  <a id="cadastre-se" style="text-decoration: none;" href="/cadastro/login">Cadastrar-se</a>
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