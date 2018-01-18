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
    header('location:index.php');
} else {
    ?>
    <head>
        <title><?= RPG_NAME ?> - Administrador</title>
    </head>
    <body id="home-page-adm">

    <h1><?= RPG_NAME ?></h1>
    <h2>Administrador</h2>
    
    <?php
    include 'menuADM.php';
    ?>
    <div class="col-xs-5">
        <form action="confirmUsers.php" class="form-horizontal" method="post" id="form"
              onsubmit="return confirm('Deseja realmente fazer a ativação dos usuários ' +
             'selecionados?')">
            <table class="table table-responsive">
                <thead class="inactiveUsers">
                <tr>
                    <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    <td>Usuários inativos</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $db = new DataBase();
                $inactiveUsers = $db->search("select idt_usuario, nme_usuario from tb_usuario where atv_usuario = 0");
                foreach ($inactiveUsers as $user) {
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="activeUser[]" value="<?= $user['idt_usuario'] ?>">
                        </td>
                        <td>
                            <?= $user['nme_usuario'] ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
            <input type="submit" value="Ativar" class="btn btn-default btn-sm">
        </form>
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