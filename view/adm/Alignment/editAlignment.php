<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:53
 */
require('../../../config.php');
include('../../../header.php');
$idt = $_GET['idt'];
if (isset($_POST['idt']) && isset($_POST['alignment-name']) && isset($_POST['alignment-desc'])) {
    $alignment = new Alignment();
    if ($alignment->checkIfExistsByName($_POST['alignment-name'])) {
            header('Location: editAlignment.php?idt=' . $idt .'&error=1');
    }else if (!preg_match ("/^[a-zA-Z\s]+$/",$_POST['alignment-name'])) {
            header('Location: editAlignment.php?idt=' . $idt .'&error=2');
    }else if ($alignment->updateAlignment($_POST['idt'], $_POST['alignment-name'], $_POST['alignment-desc']))
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
            <title>RPG_Unnamed - Editar alinhamento</title>
        </head>
        <body id="alignment-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar alinhamentos</h2>
    
    <?php
    if(isset($_GET['error'])){
        if ($_GET['error'] == 1)  {
        ?>
        <div class="alert alert-danger"><p>Nome do alinhamento já existe!</p></div>
        <?php
        }else if ($_GET['error'] == 2)  {
        ?>
        <div class="alert alert-danger"><p>Nome do alinhamento só pode possuir letras!</p></div>
        <?php
        }
    }
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-alignment-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleAlignment[0]['idt_alinhamento'] ?>">
            <label for="alignment-name">Alinhamento</label>
            <input class="form-control" type="text" id="alignment-name" name="alignment-name"
                   value="<?= $singleAlignment[0]['nme_alinhamento'] ?>" required="true">

            <label for="alignment-desc">Descrição do alinhamento</label>
            <textarea class="form-control" name="alignment-desc" id="alignment-desc"
                      required="true" form="edit-alignment-form"><?= $singleAlignment[0]['dsc_alinhamento'] ?></textarea>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}