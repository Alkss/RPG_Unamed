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
    $alignment = new Alignment();
    $deleteAlingments = "";
    foreach ($_POST['alignments'] as $singleAlignment) {
        $deleteAlingments .= $singleAlignment . ',';
    }
    $deleteAlingments = rtrim($deleteAlingments, ', ');
    if($alignment->deleteAlingment($deleteAlingments)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='alignment.php'";
        echo "</script>";
    }
}
