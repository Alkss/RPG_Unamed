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
    $equipment = new Equipment();
    $deleteEquipments = "";
    foreach ($_POST['equipments'] as $singleEquipment) {
        $deleteEquipments .= $singleEquipment . ',';
    }
    $deleteEquipments = rtrim($deleteEquipments, ', ');
    if($equipment->deleteEquipment($deleteEquipments)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='index.php'";
        echo "</script>";
    }
}
