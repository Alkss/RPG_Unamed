<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:53
 */
require('../../../config.php');
include('../../../header.php');

if (isset($_POST['idt']) && isset($_POST['attribute-name'])) {
    $attribute = new Attribute();
    if ($attribute->updateAttribute($_POST['idt'], $_POST['attribute-name']))
        header('Location:' . URL . 'view/adm/Attribute/index.php?success=2');
}


if (!isset($_GET['idt'])) {
    header('Location:' . URL . 'view/adm/Attribute/index.php?error=2');
} else {
    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {
        
        $attribute = new Attribute();
        $singleAttribute= $attribute->selectAll("idt_atributo = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title>RPG_Unnamed - Editar atributo</title>
        </head>
        <body id="attribute-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar atributos</h2>
    
    <?php
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-attribute-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleAttribute[0]['idt_atributo'] ?>">
            <label for="attribute-name">Atributo</label>
            <input class="form-control" type="text" id="attribute-name" name="attribute-name"
                   value="<?= $singleAttribute[0]['nme_atributo'] ?>">

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}