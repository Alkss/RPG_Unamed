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
    
    if (isset($_POST['expertiseName']) && isset($_POST['expertiseDesc'])) {
        $expertise = new Expertise();
        
        if ($expertise->createExpertise($_POST['expertiseName'], $_POST['expertiseDesc'])) {
            header('Location: addExpertise.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title>RPG_Unnamed - Nova Pericia</title>
    </head>
    <body id="new-expertise">

<h1><?= RPG_NAME ?></h1>
<h2>Nova pericia</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Pericia criado com sucesso!</p></div>
        <?php
    } else {
        ?>
        <div class="alert alert-error"><p>Erro na criação da perícia!</p></div>
        <?php
    }
}
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-expertise">
        <p>
            <label for="expertiseName">Pericia</label>
            <input class="form-control" type="text" id="expertiseName" name="expertiseName">
        </p>
        <p>
            <label for="expertiseDesc">Descrição da perícia</label>
        </p>
        <textarea class="form-control" form="create-new-expertise" id="expertiseDesc" name="expertiseDesc"
                  style="height: 180px"></textarea>

        <button class="btn btn-primary" id="createExpertise" name="createExpertise">Adicionar perícia</button>
    </form>
</div>
    <?php
}
