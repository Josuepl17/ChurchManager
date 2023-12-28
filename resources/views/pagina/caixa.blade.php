<?php
    $totalofertas = $totalofertas;
    $totaldizimos =  $totaldizimos;
    $totaldespesas = $totaldespesas;

    
    
 ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            
          ['Task', 'Hours per Day'],
          ['DIZMOS',   <?= $totaldizimos ?>],
          ['DESPESAS',  <?= $totaldespesas ?>],
          ['OFERTAS',      <?= $totalofertas ?>],
          
          
          
        ]);

        var options = {
          title: 'Caixa IPDR',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

<x-layout>

<div id="donutchart" style="width: 60%; height: 500px;"></div>
                <div><h1 style="color: black;">Entradas: <span style="color: green;">R${{$totaldizimos + $totalofertas}},00</span></h1>
                <h1 style="color: black;">Saidas: <span style="color: red;">R${{$totaldespesas}},00</span></h1>
                <h1 style="color: black;">Caixa Atual: <span style="color: blue;">R${{$totaldizimos + $totalofertas - $totaldespesas}},00</span></h1>


</x-layout>