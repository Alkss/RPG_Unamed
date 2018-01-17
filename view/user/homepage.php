<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/01/18
 * Time: 14:44
 */
require('../../config.php');
include('../../header.php');


if ($_SESSION['logado'] != 1) {
    header('location:index.php');
} else {
    ?>
    <head>
        <title><?= RPG_NAME ?></title>
    </head>
    <h1><?= RPG_NAME ?></h1>
    <h2>Bem Vindo!</h2>


    <?php
}