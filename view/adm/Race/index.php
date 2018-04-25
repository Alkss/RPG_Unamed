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
        <title>RPG_Unnamed - Raças</title>
    </head>
    <body id="races-home">

<h1><?= RPG_NAME ?></h1>
<h2>Raças</h2>

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
        <div class="alert alert-success">Raça alterada com sucesso!</div>
        <?php
    }
}

include '../menuADM.php';
$db = new DataBase();
$races = $db->search("SELECT * FROM td_raca");
?>
<a href="addRace.php" class="btn btn-primary" id="addClassBtn">Adicionar Raça</a><br>
<div class="col-xs-5">
    <form action="deleteRaces.php" class="form-horizontal" method="post" id="form"
          onsubmit="return confirm('Deseja realmente deletar as raças ' +
             'selecionadas?')">
        <table class="table table-responsive">
            <thead>
            <tr>
                
                <?php
                if ($races) {
                    ?>
                    <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    <?php
                } else {
                    ?>
                    <td><input disabled="disabled" type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    
                    <?php
                }
                ?>
                <td>Raça</td>
                <td>Editar</td>
            </tr>
            </thead>
            <tbody>
            
            <?php
            if ($races) {
                foreach ($races as $race) {
                    
                    ?>
                    <tr>
                        <td><input type="checkbox" name="races[]" value="<?= $race['idt_raca'] ?>">
                        </td>
                        <td><?= $race['nme_raca'] ?></td>
                        <td>
                            <a href="editRaces.php?idt=<?= $race['idt_raca'] ?>"><i class="fa fa-pencil"
                                                                                        aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-info">Não há nenhuma raça registrada ainda</div>
                <?php
            }
            ?>

            </tbody>
        </table>
        <?php
        if ($races) {
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