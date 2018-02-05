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
    $lang = new Language();
    $deleteLang = "";
    foreach ($_POST['languages'] as $singleLang) {
        $deleteLang .= $singleLang . ',';
    }
    $deleteLang = rtrim($deleteLang, ', ');
    if($lang->deleteLang($deleteLang)){
        echo "<script type='text/javascript'>";
        echo "alert('Operação realizada com sucesso');";
        echo "window.location='langs.php'";
        echo "</script>";
    }
}
