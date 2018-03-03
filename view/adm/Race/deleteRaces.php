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
    $race = new Race();
    $deleteRaces = "";
    foreach ($_POST['races'] as $singleRace) {
        $deleteRaces .= $singleRace . ',';
    }
    $deleteRaces = rtrim($deleteRaces, ', ');
    if($race->deleteRace($deleteRaces)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com successo');";
        echo "window.location='index.php'";
        echo "</script>";
    }
}
