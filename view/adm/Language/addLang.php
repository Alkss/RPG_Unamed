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
        
        if ($lang->createLang($_POST['langName'])) {
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
    } else {
        ?>
        <div class="alert alert-error"><p>Erro na criação da linguagem!</p></div>
        <?php
    }
}
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-lang">
        <p>
            <label for="langName">Linguagem</label>
            <input class="form-control" type="text" id="langName" name="langName">
        </p>
        
        <button class="btn btn-primary" id="createLang" name="createLang">Adicionar Linguagem</button>
    </form>
</div>
    <?php
}
