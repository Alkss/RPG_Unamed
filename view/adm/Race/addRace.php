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
        if ($race->checkIfExistsByName($_POST['raceName'])) {
            header('Location: addRace.php?error=1');
        }else if (!preg_match ("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/",$_POST['raceName'])) {
            header('Location: addRace.php?error=2');
        }else if ($race->createRace($_POST['raceName'], $_POST['raceDesc'])) {
            header('Location: addRace.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title>RPG_Unnamed - Nova Raça</title>
    </head>
    <body id="new-race">

<h1><?= RPG_NAME ?></h1>
<h2>Nova Raça</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Raça criada com sucesso!</p></div>
        <?php
    }
}if(isset($_GET['error'])){
        if ($_GET['error'] == 1)  {
        ?>
        <div class="alert alert-danger"><p>Esta raça já existe!</p></div>
        <?php
        }else if ($_GET['error'] == 2)  {
        ?>
        <div class="alert alert-danger"><p>Nome da raça só pode possuir letras!</p></div>
        <?php
        }
    }
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-race">
        <p>
            <label for="raceName">Nome</label>
            <input class="form-control" type="text" id="raceName" name="raceName" required="true">
        </p>
        <p>
            <label for="raceDesc">Descrição da raça</label>
        </p>
        <textarea class="form-control" form="create-new-race" id="raceDesc" name="raceDesc"
                  style="height: 180px" required="true"></textarea>

        <button class="btn btn-primary" id="createRace" name="createRace">Adicionar Raça</button>
    </form>
</div>
    <?php
}
