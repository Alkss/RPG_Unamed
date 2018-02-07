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
        
        if ($alignment->createAlignment($_POST['alignmentName'], $_POST['alignmentDesc'])) {
            header('Location: addAlignment.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title><?= RPG_NAME ?> - Novo alinhamento</title>
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
    } else {
        ?>
        <div class="alert alert-error"><p>Erro na criação do alinhamento!</p></div>
        <?php
    }
}
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-alignment">
        <p>
            <label for="alignmentName">Alinhamento</label>
            <input class="form-control" type="text" id="alignmentName" name="alignmentName">
        </p>
        <p>
            <label for="alignmentDesc">Descrição do alinhamento</label>
        </p>
        <textarea class="form-control" form="create-new-alignment" id="alignmentDesc" name="alignmentDesc"
                  style="height: 180px"></textarea>

        <button class="btn btn-primary" id="createAlignment" name="createAlignment">Adicionar alinhamento</button>
    </form>
</div>
    <?php
}
