<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/04/18
 * Time: 13:30
 */

require('../../../config.php');
include('../../../header.php');

$char = new Character();
$selectedChar = $char->selectAll("idt_personagem= " . $_GET['char']);

$race = new Race();
$selectedRace = $race->selectAll();


var_dump($selectedChar);

if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Editar </title>
    </head>
    <body id="edit-char">
    <h1><?= RPG_NAME ?></h1>
    <h2>Editar ficha de <span style="color:white"><?= $selectedChar[0]['nme_personagem'] ?></span></h2>
    <?php
    //col 2
    include '../Table/menu.php';
    include 'editCharAux.php';
    ?>
    
    </body>
    </html>
    <?php
}
