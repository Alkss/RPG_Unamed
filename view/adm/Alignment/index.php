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
        <title><?= RPG_NAME ?> - Alinhamentos</title>
    </head>
    <body id="alignment-home">

<h1><?= RPG_NAME ?></h1>
<h2>Alinhamentos</h2>

<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 2) {
        ?>
        <div class="alert alert-danger">Não foi possível editar o item selecionado, tente novamente.</div>
        <?php
        
    }
}
if (isset($_GET['sucess'])) {
    if ($_GET['sucess'] == 2) {
        ?>
        <div class="alert alert-success">Alinhamento alterado com sucesso!</div>
        <?php
    }
}

include '../menuADM.php';
$db = new DataBase();
$alignments = $db->search("SELECT * FROM td_alinhamento");
?>
<a href="addAlignment.php" class="btn btn-primary" id="addAlignmentBtn">Adicionar alinhamento</a><br>
<div class="col-xs-5">
    <form action="deleteAlignments.php" class="form-horizontal" method="post" id="form"
          onsubmit="return confirm('Deseja realmente deletar os alinhamentos ' +
             'selecionados?')">
        <table class="table table-responsive">
            <thead>
            <tr>
                
                <?php
                if ($alignments) {
                    ?>
                    <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    <?php
                } else {
                    ?>
                    <td><input disabled="disabled" type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    
                    <?php
                }
                ?>
                <td>Alinhamento</td>
                <td>Editar</td>
            </tr>
            </thead>
            <tbody>
            
            <?php
            if ($alignments) {
                foreach ($alignments as $alignment) {
                    
                    ?>
                    <tr>
                        <td><input type="checkbox" name="alignments[]" value="<?= $alignment['idt_alinhamento'] ?>">
                        </td>
                        <td><?= $alignment['nme_alinhamento'] ?></td>
                        <td>
                            <a href="editAlignment.php?idt=<?= $alignment['idt_alinhamento'] ?>"><i class="fa fa-pencil"
                                                                                                    aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-info">Não há nenhum alinhamento registrado ainda</div>
                <?php
            }
            ?>

            </tbody>
        </table>
        <?php
        if ($alignments) {
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