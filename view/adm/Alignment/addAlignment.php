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
    
    if (isset($_POST['alignmentName']) && isset($_POST['alignmentDesc'])) {
        $alignment = new Alignment();
         if ($alignment->checkIfExistsByName($_POST['alignmentName'])) {
            header('Location: addAlignment.php?error=1');
        }else if (!preg_match ("/^[a-zA-Z\s]+$/",$_POST['alignmentName'])) {
            header('Location: addAlignment.php?error=2');
        }else if ($alignment->createAlignment($_POST['alignmentName'], $_POST['alignmentDesc'])) {
            header('Location: addAlignment.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title>RPG_Unnamed - Novo alinhamento</title>
    </head>
    <body id="new-alignment">

<h1><?= RPG_NAME ?></h1>
<h2>Novo Alinhamento</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Alinhamento criado com sucesso!</p></div>
        <?php
    }
}if(isset($_GET['error'])){
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
    <form method="post" id="create-new-alignment">
        <p>
            <label for="alignmentName">Alinhamento</label>
            <input class="form-control" type="text" id="alignmentName" name="alignmentName" required="true">
        </p>
        <p>
            <label for="alignmentDesc">Descrição do alinhamento</label>
        </p>
        <textarea class="form-control" form="create-new-alignment" id="alignmentDesc" name="alignmentDesc"
                  style="height: 180px" required="true"></textarea>

        <button class="btn btn-primary" id="createAlignment" name="createAlignment">Adicionar alinhamento</button>
    </form>
</div>
    <?php
}