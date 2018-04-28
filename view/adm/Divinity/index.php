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
        <title>RPG_Unnamed - Divindades</title>
    </head>
    <body id="divinity-home">

<h1><?= RPG_NAME ?></h1>
<h2>Divindade</h2>

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
        <div class="alert alert-success">Divindade alterada com sucesso!</div>
        <?php
    }
}

include '../menuADM.php';
$db = new DataBase();
$divinities = $db->search("SELECT * FROM td_divindade");
?>
<a href="addDivinity.php" class="btn btn-primary" id="addDivinityBtn">Adicionar divindade</a><br>
<div class="col-xs-5">
    <form action="deleteDivinity.php" class="form-horizontal" method="post" id="form"
          onsubmit="return confirm('Deseja realmente deletar as divindades ' +
             'selecionadas?')">
        <table class="table table-responsive">
            <thead>
            <tr>
                
                <?php
                if ($divinities) {
                    ?>
                    <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    <?php
                } else {
                    ?>
                    <td><input disabled="disabled" type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    
                    <?php
                }
                ?>
                <td>Divindade</td>
                <td>Editar</td>
            </tr>
            </thead>
            <tbody>
            
            <?php
            if ($divinities) {
                foreach ($divinities as $divinity) {
                    
                    ?>
                    <tr>
                        <td><input type="checkbox" name="divinity[]" value="<?= $divinity['idt_divindade'] ?>">
                        </td>
                        <td><?= $divinity['nme_divindade'] ?></td>
                        <td>
                            <a href="editDivinity.php?idt=<?= $divinity['idt_divindade'] ?>"><i class="fa fa-pencil"
                                                                                                    aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-info">Não há nenhuma divindade registrada ainda</div>
                <?php
            }
            ?>

            </tbody>
        </table>
        <?php
        if ($divinities) {
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