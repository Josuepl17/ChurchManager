@extends('components.layout-tela')
@section('aba-navegacao', 'Resumo')


<style>
    .box {

        width: 250px;
        height: 55%;
        margin-top: 40px;
    }

    .box-1 {
        display: flex;
        width: 100%;
        height: 20%;
        font-size: 20px;
        justify-content: center;
        align-items: center;
        background-color: #0d1c31f6;
        color: white;
    }

    .box-2 {
        display: flex;
        width: 100%;
        height: 65%;
        background-color: white;
        justify-content: center;
        align-items: center;
    }

    .box-3 {
        display: flex;
        width: 100%;
        height: 15%;
        justify-content: center;
        align-items: center;
        background-color: var(--subtitulos);
    }






    .filtro {
        padding-top: 10px;
        display: flex;
        justify-content: center;
        align-items: center;


    }

    .conteiner-colunas {

        width: 100%;
        height: 35%;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: self-start;
        flex-wrap: wrap;
    }

    input {
        font-size: 16px;

    }

#Caixaregistrar form{
    all:unset;
    
}

button, a {
  all: unset;
  cursor: default;
  border: 1px solid rgba(255, 255, 255, 0.503);
  padding: 04px 20px;
  color: white;
  border-radius: 10px;
  font-size: 14px;
  margin-right: 10px;

}

button:hover, a:hover {
  background-color: #03e9f4;
  color: black;
  transition: 0.6s;
}

</style>
</head>

<body>

    @section('navegacao')

    <a target="_blank" href="/gerar/{{ isset($dataini) ? $dataini : '1900-01-01'}}/{{ isset($datafi) ? $datafi : '5000-01-01'}}">Gerar Relatorio</a>

    <div id="Caixaregistrar">
        <form action="/fechar" onsubmit="return minhaFuncao()" method="post">
            <input type="hidden" name="dataini" value="{{ isset($dataini) ? $dataini : '' }}">
            <input type="hidden" name="datafi" value="{{ isset($datafi) ? $datafi : '' }}">
            <input type="hidden" name="totaldespesas" value="{{$totaldespesas}}">
            <input type="hidden" name="totaldizimos" value="{{$totaldizimos}}">
            <input type="hidden" name="totalofertas" value="{{$totalofertas}}">
            <input type="hidden" name="saldo" value="{{$saldo}}">
            @csrf
           <button style="background-color: red;" type="submit">Fechar Caixa</button>
        </form>

        @endsection


        @section('conteudo')
        <div class="filtro">
            <form action="/filtro/pdf" method="post" require>
                @csrf
                <input type="date" name="dataini" id="dataini" value="{{ isset($dataini) ? $dataini : '' }}" required>
                <input type="date" name="datafi" id="datafi" value="{{ isset($datafi) ? $datafi : '' }}" required>

                <input type="submit" value="Filtrar" require>

                
            </form>
        </div>

        <div class="conteiner-colunas">
            <div class="box">
                <div class="box-1">
                    <p>Membros</p>
                </div>
                <div class="box-2">
                    <h1>{{ $qtymembros }}</h1>
                </div>
                <div class="box-3"></div>
            </div>

            <div class="box">
                <div class="box-1">
                    <p style="color: rgb(0, 254, 0);">Dizimos</p>
                </div>
                <div class="box-2">
                    <h1>R${{ number_format($totaldizimos, 2, ',', '.') }}</h1>
                </div>
                <div class="box-3"></div>
            </div>

            <div class="box">

                <div class="box-1">
                    <p style="color: rgb(0, 254, 0);">Ofertas</p>
                </div>
                <div class="box-2">
                    <h1>R${{ number_format($totalofertas, 2, ',', '.') }}</h1>
                </div>
                <div class="box-3"></div>
            </div>

            <div class="box">
                <div class="box-1">
                    <p style="color:red;">Despesas</p>
                </div>
                <div class="box-2">
                    <h1>R${{ number_format($totaldespesas, 2, ',', '.') }}</h1>
                </div>
                <div class="box-3"></div>
            </div>

            <div class="box">
                <div class="box-1">
                    <p style="color:blue;">Saldo Atual</p>
                </div>
                <div class="box-2">
                    <h1>R${{ number_format($saldo, 2, ',', '.') }}</h1>
                </div>
                <div class="box-3"></div>
            </div>

        </div>
        @endsection

        <script>
            function minhaFuncao() {
                var resposta = confirm("Você Quer fechar o Caixa Na Data Informada ??");
                if (resposta == true) {


                } else {
                    // Usuário clicou em "Cancelar"
                    alert("Você clicou em Não");
                    // O formulário não será enviado
                    return false;
                }
            }
        </script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.links-4');
            links.forEach(link => {
                link.style.backgroundColor = '#00657c';
                link.style.color = 'white';
            });
        });
    </script>




    </div>



    <script>
        var alertMessage = "{{ session('alert') }}";
        if (alertMessage) {
            alert(alertMessage);
        }
    </script>


</body>

</html>