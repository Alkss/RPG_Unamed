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
    
    if (isset($_POST['raceName']) && isset($_POST['raceDesc'])) {
        $race = new Race();
        
        if ($race->createRace($_POST['raceName'], $_POST['raceDesc'])) {
            header('Location: addRace.php?sucess=1');
        }
    }
    
    
    ?>
    <head>
        <title><?= RPG_NAME ?> - Nova Raça</title>
    </head>
    <body id="new-race">

<h1><?= RPG_NAME ?></h1>
<h2>Nova Raça</h2>

<?php
if (isset($_GET['sucess'])) {
    if ($_GET['sucess'] == 1) {
        ?>
        <div class="alert alert-success"><p>Raça criada com sucesso!</p></div>
        <?php
    } else {
        ?>
        <div class="alert alert-error"><p>Erro na criação da raça!</p></div>
        <?php
    }
}
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-race">
        <p>
            <label for="raceName">Nome</label>
            <input class="form-control" type="text" id="raceName" name="raceName">
        </p>
        <p>
            <label for="raceDesc">Descrição da raça</label>
        </p>
        <textarea class="form-control" form="create-new-race" id="raceDesc" name="raceDesc"
                  style="height: 180px"></textarea>

        <button class="btn btn-primary" id="createRace" name="createRace">Adicionar Raça</button>
    </form>
</div>
    <?php
}
