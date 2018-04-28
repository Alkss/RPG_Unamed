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
    $attribute = new Attribute();
    $deleteAttributes = "";
    foreach ($_POST['attributes'] as $singleAttribute) {
        $deleteAttributes .= $singleAttribute . ',';
    }
    $deleteAttributes = rtrim($deleteAttributes, ', ');
    if($attribute->deleteAttribute($deleteAttributes)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='index.php'";
        echo "</script>";
    }
}
