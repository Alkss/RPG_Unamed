<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 31/01/18
 * Time: 18:42
 */
require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
    header('location:' . URL . '/view/index.php');
} else {
    $class = new Classe();
    $deleteClasses = "";
    foreach ($_POST['classes'] as $singleClass) {
        $deleteClasses .= $singleClass . ',';
    }
    $deleteClasses = rtrim($deleteClasses, ', ');
    if($class->deleteClasse($deleteClasses)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='classes.php'";
        echo "</script>";
    }
}
