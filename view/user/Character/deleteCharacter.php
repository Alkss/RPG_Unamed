<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/04/18
 * Time: 21:30
 */

require('../../../config.php');
include('../../../header.php');

$char = new Character();

if ($char->deleteCharacter($_GET['char'], $_GET['idt'])) {
    echo "<script type='text/javascript'>";
    echo "alert('Operação realizada com sucesso');";
    echo "window.location='/../Table/index.php?".$_GET['idt']."'";
    echo "</script>";
}
?>


