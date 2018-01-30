<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 16:30
 */
require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
    header('location:index.php');
} else {
    ?>
    <head>
        <title><?= RPG_NAME ?> - Novo alinhamento</title>
    </head>
    <body id="new-alignment">

    <h1><?= RPG_NAME ?></h1>
    <h2>Novo Alinhamento</h2>
    
    <?php
    include '../menuADM.php';
    ?>
    
    <?php
}
