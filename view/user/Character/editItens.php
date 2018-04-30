<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/04/18
 * Time: 08:00
 */
require('../../../config.php');
include('../../../header.php');

if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    $char = new Character();
    $selectedChar = $char->selectAll("idt_personagem = " . $_GET['char']);
    
    
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Editar Pertences</title>
    </head>
    <body id="editItens">
    <h1><?= RPG_NAME ?></h1>
    <h2>Editar pertences de <?= $selectedChar[0]['nme_personagem'] ?></h2>
    <?php
    include "../Table/menu.php";
    ?>
    </body>
    </html>
    <?php
}
