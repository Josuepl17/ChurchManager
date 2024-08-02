<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 85%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
        }
        .footer {
            background-color: #f4f4f4;
            color: #555555;
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Comprovante De Dizimo</h1>
        </div>
        <div class="content">
            <p>Olá,</p>
            <p>Este é o Seu comprovante de Dizimo</p> <br>
            <p>Valor: R$  {{$codigo->codigo}},00</p>
            <p>Se você tiver alguma dúvida, não hesite em nos contatar.</p>
            <a href="#" class="button">Saiba Mais</a>
        </div>
        <div class="footer">
            <p>© 2024 Seu Nome. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>
