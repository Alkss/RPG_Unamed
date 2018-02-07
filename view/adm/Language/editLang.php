<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:53
 */
require('../../../config.php');
include('../../../header.php');

if (isset($_POST['idt']) && isset($_POST['lang-name'])) {
    $lang = new Language();
    if ($lang->updateLang($_POST['idt'], $_POST['lang-name']))
        header('Location:' . URL . 'view/adm/Language/index.php?success=2');
}


if (!isset($_GET['idt'])) {
    header('Location:' . URL . 'view/adm/Language/index.php?error=2');
} else {
    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {
        
        $lang = new Language();
        $singleLang = $lang->selectAll("idt_linguagem = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title><?= RPG_NAME ?> - Editar Linguagem</title>
        </head>
        <body id="lang-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar Linguagem</h2>
    
    <?php
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-lang-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleLang[0]['idt_linguagem'] ?>">
            <label for="lang-name">Linguagem</label>
            <input class="form-control" type="text" id="lang-name" name="lang-name"
                   value="<?= $singleLang[0]['nme_linguagem'] ?>">

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}