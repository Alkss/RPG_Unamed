<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23/04/18
 * Time: 10:30
 */
require('../../../config.php');
include('../../../header.php');

$table = new Table();

if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    ?>
    <head>
        <style>
            * {
                box-sizing: border-box;
            }

            #myInput {
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 16px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 12px;
            }

            #myTable {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 18px;
            }

            #myTable th, #myTable td {
                text-align: left;
                padding: 12px;
            }

            #myTable tr {
                border-bottom: 1px solid #ddd;
            }

            #myTable tr.header, #myTable tr:hover {
                background-color: #f1f1f1;
            }
        </style>
    </head>

    <body id="searchTables">
    <input type="text" id="myInput" onkeyup="filterTable()" placeholder="Digite um nome">

    <table id="myTable">
        <tr class="header">
            <th>Mesas</th>
        </tr>
        <?php
        $allTables = $table->selectAll();
        foreach ($allTables as $singleTable) {
            ?>
            <tr>
                <td><a href="index.php?idt=<?= $singleTable['idt_sala'] ?>" target="_blank"><?= $singleTable['nme_sala'] ?></a></td>
            </tr>
            <?php
        }
        ?>
    </table>
    </body>

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <?php
}
