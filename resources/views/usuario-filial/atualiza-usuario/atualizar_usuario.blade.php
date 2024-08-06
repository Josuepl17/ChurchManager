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
        <h2>Atualize Sua Conta</h2>
        <form action="/atualizar/user" method="post">
            @csrf
            <div class="user-box">
                <input type="text" name="user" required="" value="{{ old('user', $user->nome)}}">
                <label>Nome:</label>
            </div>
            <div class="user-box">
                <input type="text" name="email" required="" value="{{ old('email', $user->email)}}">
                <label>Email:</label>
                @error('email')
                <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
                @enderror
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Nova Senha:</label>
                @error('password')
                <p style="color: red; font-size:13px; margin-top:-18px;">{{ $message }}</p>
                @enderror
            </div>



            <button type="submit">Atualizar</button>


    </div>



</body>
TODO:UPDATE

</html>