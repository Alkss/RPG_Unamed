<?php
require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
   // header('location:' . URL . '/view/index.php');
} else {
    $table = new Table();
    $deleteTables = "";
    foreach ($_POST['tables'] as $singleTable) {
        $deleteTables .= $singleTable . ',';
    }
    $deleteTables = rtrim($deleteTables, ', ');
    if($table->deleteTable($deleteTables)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='index.php'";
        echo "</script>";
    }
}
