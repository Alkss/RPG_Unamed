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
    
    if (isset($_POST['className']) && isset($_POST['classDesc'])) {
        $class = new Classe();
        
        if ($class->createClasse($_POST['className'], $_POST['classDesc'])) {
            header('Location: addClass.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title><?= RPG_NAME ?> - Nova Classe</title>
    </head>
    <body id="new-class">

<h1><?= RPG_NAME ?></h1>
<h2>Nova Classe</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Classe criada com sucesso!</p></div>
        <?php
    } else {
        ?>
        <div class="alert alert-error"><p>Erro na criação da Classe!</p></div>
        <?php
    }
}
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-class">
        <p>
            <label for="className">Classe</label>
            <input class="form-control" type="text" id="className" name="className">
        </p>
        <p>
            <label for="classDesc">Descrição da Classe</label>
        </p>
        <textarea class="form-control" form="create-new-class" id="classDesc" name="classDesc"
                  style="height: 180px"></textarea>

        <button class="btn btn-primary" id="createclass" name="createclass">Adicionar Classe</button>
    </form>
</div>
    <?php
}
