<?php
require('../../../config.php');
include('../../../header.php');

if (isset($_POST['idt']) && isset($_POST['expertise-name']) && isset($_POST['expertise-desc'])) {
    $expertise = new Expertise();
    if ($expertise->updateExpertise($_POST['idt'], $_POST['expertise-name'], $_POST['expertise-desc']))
        header('Location:' . URL . 'view/adm/Expertise/index.php?success=2');
}


if (!isset($_GET['idt'])) {
    header('Location:' . URL . 'view/adm/Expertise/index.php?error=2');
} else {
    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {
        
        $expertise = new Expertise();
        $singleExpertise = $expertise->selectAll("idt_pericia = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title>RPG_Unnamed - Editar pericia</title>
        </head>
        <body id="expertise-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar pericia</h2>
    
    <?php
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-expertise-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleExpertise[0]['idt_pericia'] ?>">
            <label for="expertise-name">Perícia</label>
            <input class="form-control" type="text" id="expertise-name" name="expertise-name"
                   value="<?= $singleExpertise[0]['nme_pericia'] ?>"

            <label for="expertise-desc">Descrição da perícia</label>
            <textarea class="form-control" name="expertise-desc" id="expertise-desc"
                      form="edit-expertise-form"><?= $singleExpertise[0]['dsc_pericia'] ?></textarea>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}