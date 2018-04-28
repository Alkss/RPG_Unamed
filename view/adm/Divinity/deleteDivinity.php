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
    $divinity = new Divinity();
    $deleteDivinities = "";
    foreach ($_POST['divinities'] as $singleDivinity) {
        $deleteDivinities .= $singleDivinity . ',';
    }
    $deleteDivinities = rtrim($deleteDivinities, ', ');
    if($divinity->deleteDivinity($deleteDivinities)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='index.php'";
        echo "</script>";
    }
}
