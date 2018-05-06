<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 16:16
 */
require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
    header('location:' . URL . '/view/index.php');
} else {
    
    ?>
    <head>
        <title>RPG_Unnamed - Salas</title>
    </head>
    <body id="table-home-adm">

<h1><?= RPG_NAME ?></h1>
<h2>Salas</h2>

<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 2) {
        ?>
        <div class="alert alert-danger">Não foi possível editar o item selecionado, tente novamente.</div>
        <?php
        
    }
}
if (isset($_GET['success'])) {
    if ($_GET['success'] == 2) {
        ?>
        <div class="alert alert-success">Sala alterada com sucesso!</div>
        <?php
    }
}

include '../menuADM.php';
$db = new DataBase();
$tables = $db->search("SELECT * FROM tb_sala");
?>
<a href="addTable.php" class="btn btn-primary" id="addTableBtn">Adicionar mesa</a><br>
<div class="col-xs-5">
    <form action="deleteTable.php" class="form-horizontal" method="post" id="form"
          onsubmit="return confirm('Deseja realmente deletar as mesas ' +
             'selecionadas?')">
        <table class="table table-responsive">
            <thead>
            <tr>
                
                <?php
                if ($tables) {
                    ?>
                    <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    <?php
                } else {
                    ?>
                    <td><input disabled="disabled" type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    
                    <?php
                }
                ?>
                <td>Mesa</td>
                <td>Editar</td>
            </tr>
            </thead>
            <tbody>
            
            <?php
            if ($tables) {
                foreach ($tables as $table) {
                    
                    ?>
                    <tr>
                        <td><input type="checkbox" name="tables[]" value="<?= $table['idt_sala'] ?>">
                        </td>
                        <td><?= $table['nme_sala'] ?></td>
                        <td>
                            <a href="editTable.php?idt=<?= $table['idt_sala'] ?>"><i class="fa fa-pencil"
                                                                                                    aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-info">Não há nenhuma sala registrada ainda</div>
                <?php
            }
            ?>

            </tbody>
        </table>
        <?php
        if ($tables) {
            ?>
            <input type="submit" value="Deletar" class="btn btn-default btn-sm">
            <?php
        } else {
            ?>
            <input disabled="disabled" type="submit" value="Deletar" class="btn btn-default btn-sm">
    
            <?php
        }
        ?>


    </form>
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
    
    <?php
}