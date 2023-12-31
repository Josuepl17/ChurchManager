<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }

    .titulo{
        border: 1px solid black;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 10vh;
    }

    nav{
        border: 1px solid black;
        display: flex;
        width: 100%;
        height: 5vh;
        justify-content: flex-start;
        align-items: center;
    }

    .conteiner-colunas {
        border: 1px solid black;
        width: 100%;
        height: 80vh;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: self-start;
        
        
    }

    .box{
        border: 1px solid black;
        width: 20%;
        height: 30%;
        margin-top: 40px;
        

        
    }

    .box-1{
        display: flex;
        width: 100%;
        height: 15%;
        border: 1px solid black;
        justify-content: center;
        align-items: center;
    }

    .box-2{
        display: flex;
        width: 100%;
        height: 65%;
        border: 1px solid black;
    }

    .box-3{
        display: flex;
        width: 100%;
        height: 18%;
        border: 1px solid black;
        justify-content: center;
        align-items: center;
    }

    a{
        font-size: 20px;
    }






    </style>
</head>
<body>

<div class="conteiner">
<div class="titulo"> <h1>Igreja Presbiteriana da Renovação</h1> </div>

<nav> <a href="#">Dashboard</a></nav>

<div class="conteiner-colunas">
  <div class="box">
  <div class="box-1" > <p>Membros</p> </div>
    <div class="box-2" ><h1>//</h1></div>
    <div class="box-3" > <p>Relatorio</p> </div>
  </div>

  <div class="box">
    <div class="box-1" > <p>Membros</p> </div>
    <div class="box-2" ><h1>//</h1></div>
    <div class="box-3" > <p>Relatorio</p> </div>
  </div>

  <div class="box">
    <div class="box-1" > <p>Membros</p> </div>
    <div class="box-2" ><h1>//</h1></div>
    <div class="box-3" > <p>Relatorio</p> </div>
  </div>

  <div class="box">
    <div class="box-1" > <p>Membros</p> </div>
    <div class="box-2" ><h1>//</h1></div>
    <div class="box-3" > <p>Relatorio</p> </div>
  </div>




</div>

</div>
</body>
</html>