<?php
    $labels = "";
    $values = "";
    $db = new DataBase();
    $userData = $db->search("select count(*) as Total,DATE_FORMAT(dta_criacao_usuario, \"%M %Y\") as Mes from tb_usuario GROUP BY Mes LIMIT 12;");
    foreach ($userData as $data) {
        $labels .= "\"" . $data['Mes']. "\",";
        $values .= $data['Total'] . ",";
    }
?>
<script src="http://localhost/RPG_Unamed/view/js/Chart.bundle.min.js"></script>
<?php
if ($userData) {
?>
<div id="line">
    <h3>Número de usuários cadastrados mensalmente</h3>
    <canvas class="lineChart"></canvas>
</div>
<script>
    var ctx = document.getElementsByClassName("lineChart");
    
    var chartGraph = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?= $labels ?>],
            datasets: [{
             label: "Taxa de usuários cadastrados",
             data: [<?= $values ?>],
             borderWidth: 2,
             borderColor: 'rgba(255, 199, 9, 1)',
             backgroundColor: 'rgba(255, 199, 9, 0.3)',
            }]
        }
    })
</script>
<?php
}
?>
