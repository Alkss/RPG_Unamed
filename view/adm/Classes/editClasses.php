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
if (isset($_POST['idt']) && isset($_POST['class-name']) && isset($_POST['class-desc'])) {
    $class = new Classe();
    if ($class->checkIfExistsByName($_POST['class-name'],$idt)) {
        header('Location: editClasses.php?idt=' . $idt .'&error=1');
    }else if ($class->updateClasse($_POST['idt'], $_POST['class-name'], $_POST['class-desc'])){
        header('Location:' . URL . 'view/adm/Classes/index.php?success=2');
    }
}


if (!isset($_GET['idt'])) {
    header('Location:' . URL . 'view/adm/Classes/index.php?error=2');
} else {
    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {
        
        $class = new Classe();
        $singleClass = $class->selectAll("idt_classe = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title>RPG_Unnamed - Editar Classe</title>
        </head>
        <body id="class-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar Classe</h2>
    
    <?php
    if(isset($_GET['error'])){
        if ($_GET['error'] == 1)  {
        ?>
        <div class="alert alert-danger"><p>Nome da classe já existe!</p></div>
        <?php
        }
    }
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-classes-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleClass[0]['idt_classe'] ?>">
            <label for="class-name">Classe</label>
            <input class="form-control" type="text" id="class-name" name="class-name"
                   value="<?= $singleClass[0]['nme_classe'] ?>" required="true">

            <label for="class-desc">Descrição da classe</label>
            <textarea class="form-control" name="class-desc" id="class-desc"
                      form="edit-classes-form"><?= $singleClass[0]['dsc_classe'] ?></textarea>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}