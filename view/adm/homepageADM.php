<?php
require('../../config.php');
include('../../header.php');
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/01/18
 * Time: 13:57
 */


if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
    header('location:' . URL . '/view/index.php');
} else {
    ?>
    <head>
        <title>RPG_Unnamed - Administrador</title>
    </head>
    <body id="home-page-adm">

    <h1><?= RPG_NAME ?></h1>
    <h2><?= ADMINISTRADOR ?></h2>
    
    <?php
    include 'menuADM.php';
    $db = new DataBase();
    $inactiveUsers = $db->search("select idt_usuario, nme_usuario from tb_usuario where atv_usuario = 0");
    $qtd_inactiveUsers = $db->search("select count(idt_usuario) as Total from tb_usuario where atv_usuario = 0;");
    ?>
    <div class="col-xs-5">
        <?php
        if ($qtd_inactiveUsers[0]['Total'] > 0) {
            ?>
            <form action="confirmUsers.php" class="form-horizontal" method="post" id="form"
                  onsubmit="return confirm('Deseja realmente fazer a ativação dos usuários ' +
                 'selecionados?')">
                <div class="panel panel-info">
                    <div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion"
                         href="#collapseThree" aria-expanded="false" id="inativeUsers">
                        <h4 class="panel-title">
                            <p>
                                Usuários a serem ativados (<?= $qtd_inactiveUsers[0]['Total'] ?>)
                            </p>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <table class="table table-responsive">
                                <thead class="inactiveUsers">
                                <tr>
                                    
                                    <?php
                                    if ($inactiveUsers) {
                                        ?>
                                        <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                                        <?php
                                    } else {
                                        ?>
                                        <td><input disabled="disabled" type="checkbox" onchange="checkAll(this)"
                                                   name="chk[]"/></td>
                                        
                                        <?php
                                    }
                                    ?>

                                    <td>Usuários inativos</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($inactiveUsers) {
                                    foreach ($inactiveUsers as $user) {
                                        ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="activeUser[]"
                                                       value="<?= $user['idt_usuario'] ?>">
                                            </td>
                                            <td>
                                                <?= $user['nme_usuario'] ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <div class="alert alert-info">Não há nenhum usuário inativo para ser aprovado!</div>
                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
                            <?php
                            if ($inactiveUsers) {
                                ?>
                                <input type="submit" value="Ativar" class="btn btn-default btn-sm">
                                <?php
                            } else {
                                ?>
                                <input disabled="disabled" type="submit" value="Ativar" class="btn btn-default btn-sm">
                                
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </form>
            <?php
        }
        ?>

        <div class="chart-container">
            <?php
            include('Charts/PieChart.php');
            include('Charts/LineChart.php');
            ?>
        </div>

    </div>
    <script>

        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    console.log(i)
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }


    </script>
    </body>
    <?php
}