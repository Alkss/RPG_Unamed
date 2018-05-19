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
    
    if (isset($_POST['itemName']) && isset($_POST['itemDesc'])) {
        $item = new Item();
        
        if ($item->createItem($_POST['itemName'], $_POST['itemDesc'])) {
            header('Location: addItem.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title>RPG_Unnamed - Novo item</title>
    </head>
    <body id="new-item">

<h1><?= RPG_NAME ?></h1>
<h2>Novo Item</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Item criado com sucesso!</p></div>
        <?php
    } else {
        ?>
        <div class="alert alert-error"><p>Erro na criação do item!</p></div>
        <?php
    }
}
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-item">
        <p>
            <label for="itemName">Item</label>
            <input class="form-control" type="text" id="itemName" name="itemName" required="true">
        </p>
        <p>
            <label for="itemDesc">Descrição do item</label>
        </p>
        <textarea class="form-control" form="create-new-item" id="itemDesc" name="itemDesc"
                  style="height: 180px" required="true"></textarea>

        <button class="btn btn-primary" id="createItem" name="createItem">Adicionar item</button>
    </form>
</div>
    <?php
}
