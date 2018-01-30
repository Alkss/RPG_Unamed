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
    header('location:index.php');
} else {
    ?>
    <head>
        <title><?= RPG_NAME ?> - Alinhamentos</title>
    </head>
    <body id="alignment-home">

<h1><?= RPG_NAME ?></h1>
<h2>Alinhamentos</h2>

<?php
include '../menuADM.php';
?>
<a href="addAlignment.php" class="btn btn-primary" id="addAlignmentBtn">Adicionar alinhamento</a><br>
<div class="col-xs-5">
    <form action="../confirmUsers.php" class="form-horizontal" method="post" id="form"
          onsubmit="return confirm('Deseja realmente fazer a ativação dos usuários ' +
             'selecionados?')">
        <table class="table table-responsive">
            <thead>
            <tr>
                <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                <td>Alinhamento</td>
                <td>Editar</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" name="activeUser[]" value=""></td>
                <td>Bla bla bla</td>
                <td><a class="btn btn-primary">Editar</a></td>
            </tr>

            </tbody>
        </table>
        <input type="submit" value="Deletar" class="btn btn-default btn-sm">
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