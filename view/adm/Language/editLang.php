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
if (isset($_POST['idt']) && isset($_POST['lang-name'])) {
    $lang = new Language();
        if ($lang->checkIfExistsByName($_POST['lang-name'],$idt)) {
            header('Location: editLang.php?idt=' . $idt . '&error=1');
        }else if (!preg_match ("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/",$_POST['lang-name'])) {
            header('Location: editLang.php?idt=' . $idt . '&error=2');
        }else if ($lang->updateLang($_POST['idt'], $_POST['lang-name']))
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
            <title>RPG_Unnamed - Editar Linguagem</title>
        </head>
        <body id="lang-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar Linguagem</h2>
    
    <?php
        if(isset($_GET['error'])){
            if ($_GET['error'] == 1)  {
            ?>
            <div class="alert alert-danger"><p>Esta linguagem já existe!</p></div>
            <?php
            }else if ($_GET['error'] == 2)  {
            ?>
            <div class="alert alert-danger"><p>Nome da linguagem só pode possuir letras!</p></div>
            <?php
            }
        }
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-lang-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleLang[0]['idt_linguagem'] ?>">
            <label for="lang-name">Linguagem</label>
            <input class="form-control" type="text" id="lang-name" name="lang-name"
                   value="<?= $singleLang[0]['nme_linguagem'] ?>" required="true">

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}