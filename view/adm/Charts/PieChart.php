<?php
    $labels = "";
    $values = "";
    $db = new DataBase();
    $tableData = $db->search("select count(cod_usuario) as Total,nme_sala as Sala from ta_perfil_sala
	   JOIN tb_usuario ON cod_usuario = idt_usuario
       JOIN tb_sala on cod_sala = idt_sala group by nme_sala;");
    if($tableData){
    foreach ($tableData as $data) {
        $labels .= "\"" . $data['Sala']. "\",";
        $values .= $data['Total'] . ",";
    }
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php
if ($tableData) {
?>
<script>
    var ctx = document.getElementsByClassName("pieChart");
    
    var chartGraph = new Chart(ctx, {
        type: 'pie',
        options:[{
            responsive:false,
            maintainAspectRatio: false,
        }],
        data: {
            labels: [<?= $labels ?>],
            datasets: [{
             label: "Taxa de usuários cadastrados",
             data: [<?= $values ?>],
            options: {
            title: {
                display: true,
                text: 'Custom Chart Title'
            }
            },
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            }]
        }
    })
</script>
<?php
}
?>
<?php
if ($tableData) {
?>
<h3>Salas com mais jogadores</h3>
<canvas class="pieChart"></canvas>
<?php
}
?>