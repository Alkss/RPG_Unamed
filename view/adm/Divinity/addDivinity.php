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
    
    if (isset($_POST['divinityName']) && isset($_POST['divinityDesc'])) {
        $divinity = new Divinity();
        
        if ($divinity->createDivinity($_POST['divinityName'], $_POST['divinityDesc'])) {
            header('Location: addDivinity.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title>RPG_Unnamed - Nova divindade</title>
    </head>
    <body id="new-divinity">

<h1><?= RPG_NAME ?></h1>
<h2>Nova divindade</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Divindade criada com sucesso!</p></div>
        <?php
    } else {
        ?>
        <div class="alert alert-error"><p>Erro na criação da divindade!</p></div>
        <?php
    }
}
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-divinity">
        <p>
            <label for="divinityName">Divindade</label>
            <input class="form-control" type="text" id="divinityName" name="divinityName" required="true">
        </p>
        <p>
            <label for="divinityDesc">Descrição da divindade</label>
        </p>
        <textarea class="form-control" form="create-new-divinity" id="divinityDesc" name="divinityDesc"
                  style="height: 180px"></textarea>

        <button class="btn btn-primary" id="createDivinity" name="createDivinity">Adicionar divindade</button>
    </form>
</div>
    <?php
}
