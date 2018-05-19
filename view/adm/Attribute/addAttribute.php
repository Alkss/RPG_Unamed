<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 16:30
 */
require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
    header('location:' . URL . '/view/index.php');
} else {
    
    if (isset($_POST['attributeName'])) {
        $attribute = new Attribute();
        
        if ($attribute->createAttribute($_POST['attributeName'])) {
            header('Location: addAttribute.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title>RPG_Unnamed - Novo atributo</title>
    </head>
    <body id="new-attribute">

<h1><?= RPG_NAME ?></h1>
<h2>Novo atributo</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Atributo criado com sucesso!</p></div>
        <?php
    } else {
        ?>
        <div class="alert alert-error"><p>Erro na criação do atributo!</p></div>
        <?php
    }
}
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-attribute">
        <p>
            <label for="attributeName">Atributo</label>
            <input class="form-control" type="text" id="attributeName" name="attributeName" required="true">
        </p>

        <button class="btn btn-primary" id="createAttribute" name="createAttribute">Adicionar atributo</button>
    </form>
</div>
    <?php
}
