<?php
require('../../../config.php');
include('../../../header.php');
$idt = $_GET['idt'];
if (isset($_POST['idt']) && isset($_POST['divinity-name']) && isset($_POST['divinity-desc'])) {
    $divinity = new Divinity();
    if ($divinity->checkIfExistsByName($_POST['divinity-name'],$id)) {
            header('Location: editDivinity.php?idt=' . $idt . '&error=1');
    }else if (!preg_match ("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/",$_POST['divinity-name'])) {
            header('Location: editDivinity.php?idt=' . $idt . '&error=2');
    }else if ($divinity->updateDivinity($_POST['idt'], $_POST['divinity-name'], $_POST['divinity-desc']))
        header('Location:' . URL . 'view/adm/Divinity/index.php?success=2');
}


if (!isset($_GET['idt'])) {
    header('Location:' . URL . 'view/adm/Divinity/index.php?error=2');
} else {
    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {
        
        $divinity = new Divinity();
        $singleDivinity = $divinity->selectAll("idt_divindade = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title>RPG_Unnamed - Editar divindade</title>
        </head>
        <body id="divinity-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar divindades</h2>
    
    <?php
    if(isset($_GET['error'])){
            if ($_GET['error'] == 1)  {
            ?>
            <div class="alert alert-danger"><p>Esta divindade já existe!</p></div>
            <?php
            }else if ($_GET['error'] == 2)  {
            ?>
            <div class="alert alert-danger"><p>Nome da divindade só pode possuir letras!</p></div>
            <?php
            }
        }        
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-divinity-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleDivinity[0]['idt_divindade'] ?>">
            <label for="divinity-name">Divindade</label>
            <input class="form-control" type="text" id="divinity-name" name="divinity-name"
                   value="<?= $singleDivinity[0]['nme_divindade'] ?>" required="true">

            <label for="alignment-desc">Descrição do alinhamento</label>
            <textarea class="form-control" name="divinity-desc" id="divinity-desc"
                      required="true" form="edit-divinity-form"><?= $singleDivinity[0]['dsc_divindade'] ?></textarea>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}