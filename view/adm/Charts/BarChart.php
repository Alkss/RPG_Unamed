<?php
    $labels = "";
    $values = "";
    $db = new DataBase();
    $tableData = $db->search("select count(cod_raca) as Total, nme_raca as Racas from tb_personagem RIGHT JOIN td_raca ON cod_raca= idt_raca group by nme_raca;");
    if($tableData){
    foreach ($tableData as $data) {
        $labels .= "\"" . $data['Racas']. "\",";
        $values .= $data['Total'] . ",";
    }
}
?>
<script src="http://localhost/RPG_Unamed/view/js/Chart.bundle.min.js"></script>
<?php
if ($tableData) {
?>
<div id="bar">
    <h3>Uso de Raças</h3>
    <canvas class="barChart"></canvas>
</div>

<script>
    var ctx = document.getElementsByClassName("barChart");
    
    var chartGraph = new Chart(ctx, {
        type: 'bar',
        options:[{
            responsive:false,
            maintainAspectRatio: false,
        }],
        data: {
            labels: [<?= $labels ?>],
            datasets: [{
             label: "Uso de raças",
             data: [<?= $values ?>],
            options: {
            title: {
                display: true,
                text: 'Custom Chart Title'
            }
            },
                backgroundColor: [
                    'rgba(129,86,220,0.2)',
                    'rgba(44,192,202,0.2)',
                    'rgba(174,139,77,0.2)',
                    'rgba(237,190,74, 0.2)',
                    'rgba(235,90,193, 0.2)',
                    'rgba(31,205,30,0.2)',
                    'rgba(78,80,77,0.2)',
                    'rgba(91,126,216, 0.2)',
                    'rgba(224,121,72,0.2)',
                    'rgba(179,68,73,0.2)',
                    'rgba(26,165,190,0.2)',
                    'rgba(158,60,52,0.2)'
            ],
            borderColor: [
                    'rgba(129,86,220,0.2)',
                    'rgba(44,192,202,0.2)',
                    'rgba(174,139,77,0.2)',
                    'rgba(237,190,74, 0.2)',
                    'rgba(235,90,193, 0.2)',
                    'rgba(31,205,30,0.2)',
                    'rgba(78,80,77,0.2)',
                    'rgba(91,126,216, 0.2)',
                    'rgba(224,121,72,0.2)',
                    'rgba(179,68,73,0.2)',
                    'rgba(26,165,190,0.2)',
                    'rgba(158,60,52,0.2)'
            ],
            }]
        }
    })
</script>
<?php
}
?>