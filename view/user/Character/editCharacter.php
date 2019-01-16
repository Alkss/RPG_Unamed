<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/04/18
 * Time: 13:30
 */

require('../../../config.php');
include('../../../header.php');

$chararacter = new Character();
$selectedChar = $chararacter->selectAll("idt_personagem= " . $_GET['char']);

$race = new Race();
$selectedRace = $race->selectAll();

$class = new Classe();
$selectedClass = $class->selectAll();

$alignment = new Alignment();
$selectedAlignment = $alignment->selectAll();


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
    if (isset($_POST['editName']) && isset($_POST['editRace']) && isset($_POST['editAlignment']) && isset($_POST['editClass'])
        && isset($_POST['editGenre']) && isset($_POST['eyeColor']) && isset($_POST['height']) && isset($_POST['weight'])
        && isset($_POST['idt'])
    ) {
        
        $idt = $_POST['idt'];
        $name = $_POST['editName'];
        $editRace = $_POST['editRace'];
        $editAlignment = $_POST['editAlignment'];
        $editClass = $_POST['editClass'];
        $editGenre = $_POST['editGenre'];
        $editEyeColor = $_POST['eyeColor'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $editImg = $_POST['editImg'];
        $editHist = $_POST['editHist'];
        
        $chararacter->updateCharacter($idt, $name, $editRace, $editAlignment, $editClass, $editGenre, $editEyeColor, $height, $weight, $editImg, $editHist);
        header('Location:../Table/index.php?char='.$_GET['char'].'&idt='.$_GET['idt']);
        
    } else {
        include 'editCharAux.php';
        ?>
        </body>
        </html>
        <?php
    }
}
