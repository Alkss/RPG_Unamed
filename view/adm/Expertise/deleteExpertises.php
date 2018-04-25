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
    $expertise = new Expertise();
    $deleteExpertises = "";
    foreach ($_POST['expertises'] as $singleExpertise) {
        $deleteExpertises .= $singleExpertise . ',';
    }
    $deleteExpertises = rtrim($deleteExpertises, ', ');
    if($expertise->deleteExpertise($deleteExpertises)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='index.php'";
        echo "</script>";
    }
}
