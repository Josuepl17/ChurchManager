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
        <h2>Adicionando Conta</h2>
        <form action="/atualizar/user" method="post">
            @csrf
            <div class="user-box">
                <input type="text" name="user" required="" value="{{ isset($user->nome) ? $user->nome : '' }}">
                <label>Nome:</label>
            </div>
            <div class="user-box">
                <input type="text" name="email" required="" value="{{ isset($user->email) ? $user->email : '' }}">
                <label>Email:</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="" >
                <label>Nova Senha:</label>
            </div>

            <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">

            <button type="submit">Atualizar</button>


    </div>


    @if (Session::has('falha'))
    <div style="color:red" class="msg">
        <p>{{ Session::get('falha') }}</p>
    </div>
    {{ Session::forget('falha') }}
    @endif

</body>

</html>