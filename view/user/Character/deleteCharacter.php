<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/04/18
 * Time: 21:30
 */

require('../../../config.php');
include('../../../header.php');

if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    $char = new Character();
    
    if ($char->deleteCharacter($_GET['char'], $_GET['idt'])) {
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='../Table/index.php?idt=" . $_GET['idt'] . "'";
        echo "</script>";
    }
}
?>


