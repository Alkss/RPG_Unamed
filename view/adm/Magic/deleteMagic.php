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
    $magic = new Magic();
    $deleteMagics = "";
    foreach ($_POST['magics'] as $singleMagic) {
        $deleteMagics .= $singleMagic . ',';
    }
    $deleteMagics = rtrim($deleteMagics, ', ');
    if($magic->deleteMagic($deleteMagics)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='index.php'";
        echo "</script>";
    }
}
