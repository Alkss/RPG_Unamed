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
        <title><?= RPG_NAME ?> - Linguagens</title>
    </head>
    <body id="lang-home">

<h1><?= RPG_NAME ?></h1>
<h2>Linguagens</h2>

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
        <div class="alert alert-success">Linguagem alterada com sucesso!</div>
        <?php
    }
}

include '../menuADM.php';
$db = new DataBase();
$langs = $db->search("SELECT * FROM td_linguagem");
?>
<a href="addLang.php" class="btn btn-primary" id="addClassBtn">Adicionar Linguagem</a><br>
<div class="col-xs-5">
    <form action="deleteLang.php" class="form-horizontal" method="post" id="form"
          onsubmit="return confirm('Deseja realmente deletar as linguagens ' +
             'selecionadas?')">
        <table class="table table-responsive">
            <thead>
            <tr>
                
                <?php
                if ($langs) {
                    ?>
                    <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    <?php
                } else {
                    ?>
                    <td><input disabled="disabled" type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                    
                    <?php
                }
                ?>
                <td>Linguagem</td>
                <td>Editar</td>
            </tr>
            </thead>
            <tbody>
            
            <?php
            if ($langs) {
                foreach ($langs as $lang) {
                    
                    ?>
                    <tr>
                        <td><input type="checkbox" name="languages[]" value="<?= $lang['idt_linguagem'] ?>">
                        </td>
                        <td><?= $lang['nme_linguagem'] ?></td>
                        <td>
                            <a href="editLang.php?idt=<?= $lang['idt_linguagem'] ?>"><i class="fa fa-pencil"
                                                                                        aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-info">Não há nenhuma linguagem registrada ainda</div>
                <?php
            }
            ?>

            </tbody>
        </table>
        <?php
        if ($langs) {
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