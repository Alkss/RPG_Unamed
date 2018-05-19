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
    
    if (isset($_POST['langName'])) {
        $lang = new Language();
        if ($lang->checkIfExistsByName($_POST['langName'])) {
            header('Location: addLang.php?error=1');
        }else if (!preg_match ("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/",$_POST['langName'])) {
            header('Location: addLang.php?error=2');
        }else if ($lang->createLang($_POST['langName'])) {
            header('Location: addLang.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title>RPG_Unnamed - Nova Linguagem</title>
    </head>
    <body id="new-lang">

<h1><?= RPG_NAME ?></h1>
<h2>Nova Linguagem</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Linguagem criada com sucesso!</p></div>
        <?php
    }
}if(isset($_GET['error'])){
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
    <form method="post" id="create-new-lang">
        <p>
            <label for="langName">Linguagem</label>
            <input class="form-control" type="text" id="langName" name="langName" required="true">
        </p>
        
        <button class="btn btn-primary" id="createLang" name="createLang">Adicionar Linguagem</button>
    </form>
</div>
    <?php
}
