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
    $item = new Item();
    $deleteItems = "";
    foreach ($_POST['items'] as $singleItem) {
        $deleteItems .= $singleItem . ',';
    }
    $deleteItems = rtrim($deleteItems, ', ');
    if($item->deleteItem($deleteItems)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='index.php'";
        echo "</script>";
    }
}
