<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Novo Cadastro</title>
  <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
  <link href="{{ asset('css/usuario-filial.css') }}" rel="stylesheet">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="login-box">
    <h2>Nova Filial</h2>
    <form action="/cadastro/empresa/novo" method="get">
      

  

      <div class="user-box">
        <input type="text" name="razao" required="" value="{{ isset($dados->razao) ? $dados->razao : '' }}">
        <label>Razão Social:</label>
      </div>
      <div class="user-box">
        <input type="number" name="cnpj" maxlength="2" required="" value="{{ isset($dados->cnpj) ? $dados->cnpj : '' }}">
        <label>CNPJ:</label>
      </div>


      <div style="color: white;">
    @foreach ($users as $user)
    <input type="checkbox" name="user[]"  value="{{ $user->id }}" id="user_id{{ $user->id }}">
    <label for="user_{{ $user->nome }}">{{ $user->nome }}</label>
    @endforeach


</div>
<br>
<div id="alinhar">
        <button type="submit">Atualizar</button>
        <a href="/selecionar/filial">Voltar</a>
</div>

    </form>
  </div>
  @if (Session::has('falha'))
  <div style="background-color: red;" class="msg">
    <p>{{ Session::get('falha') }}</p>
  </div>
  {{ Session::forget('falha') }}
  @endif


</body>

</html>