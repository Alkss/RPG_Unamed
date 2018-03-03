<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:53
 */
require('../../../config.php');
include('../../../header.php');

if (isset($_POST['idt']) && isset($_POST['race-name']) && isset($_POST['race-desc'])) {
    $race = new Race();
    if ($race->updateRace($_POST['idt'], $_POST['race-name'], $_POST['race-desc']))
        header('Location:' . URL . 'view/adm/Race/index.php?success=2');
}


if (!isset($_GET['idt'])) {
    header('Location:' . URL . 'view/adm/Race/index.php?error=2');
} else {
    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {
        
        $race = new Race();
        $singleRace = $race->selectAll("idt_raca = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title><?= RPG_NAME ?> - Editar Raça</title>
        </head>
        <body id="race-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar Raça</h2>
    
    <?php
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-race-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleRace[0]['idt_raca'] ?>">
            <label for="race-name">Raça</label>
            <input class="form-control" type="text" id="race-name" name="race-name"
                   value="<?= $singleRace[0]['nme_raca'] ?>"

            <label for="race-desc">Descrição da Raça</label>
            <textarea class="form-control" name="race-desc" id="race-desc"
                      form="edit-race-form"><?= $singleRace[0]['dsc_raca'] ?></textarea>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}