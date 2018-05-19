<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:53
 */
require('../../../config.php');
include('../../../header.php');

if (isset($_POST['idt']) && isset($_POST['item-name']) && isset($_POST['item-desc'])) {
    $item = new Item();
    if ($item->updateItem($_POST['idt'], $_POST['item-name'], $_POST['item-desc']))
        header('Location:' . URL . 'view/adm/Item/index.php?success=2');
}


if (!isset($_GET['idt'])) {
    header('Location:' . URL . 'view/adm/Item/index.php?error=2');
} else {
    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {
        
        $item = new Item();
        $singleItem = $item->selectAll("idt_item = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title>RPG_Unnamed - Editar item</title>
        </head>
        <body id="item-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar items</h2>
    
    <?php
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-item-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleItem[0]['idt_item'] ?>">
            <label for="item-name">Item</label>
            <input class="form-control" type="text" id="item-name" name="item-name"
                   value="<?= $singleItem[0]['nme_item'] ?>" required="true">

            <label for="item-desc">Descrição do item</label>
            <textarea class="form-control" name="item-desc" id="item-desc"
                     required="true" form="edit-item-form"><?= $singleItem[0]['dsc_item'] ?></textarea>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}