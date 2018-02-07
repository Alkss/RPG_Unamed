<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:53
 */
require('../../../config.php');
include('../../../header.php');

if (isset($_POST['idt']) && isset($_POST['alignment-name']) && isset($_POST['alignment-desc'])) {
    $alignment = new Alignment();
    if ($alignment->updateAlignment($_POST['idt'], $_POST['alignment-name'], $_POST['alignment-desc']))
        header('Location:' . URL . 'view/adm/Alignment/index.php?success=2');
}


if (!isset($_GET['idt'])) {
    header('Location:' . URL . 'view/adm/Alignment/index.php?error=2');
} else {
    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {
        
        $alignment = new Alignment();
        $singleAlignment = $alignment->selectAll("idt_alinhamento = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title><?= RPG_NAME ?> - Editar alinhamento</title>
        </head>
        <body id="alignment-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar alinhamentos</h2>
    
    <?php
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-alignment-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleAlignment[0]['idt_alinhamento'] ?>">
            <label for="alignment-name">Alinhamento</label>
            <input class="form-control" type="text" id="alignment-name" name="alignment-name"
                   value="<?= $singleAlignment[0]['nme_alinhamento'] ?>"

            <label for="alignment-desc">Descrição do alinhamento</label>
            <textarea class="form-control" name="alignment-desc" id="alignment-desc"
                      form="edit-alignment-form"><?= $singleAlignment[0]['dsc_alinhamento'] ?></textarea>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}