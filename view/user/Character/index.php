<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23/04/18
 * Time: 16:50
 */
require('../../../config.php');
include('../../../header.php');

$char = new Character();
$selectedChar = $char->selectAll("idt_personagem = " . $_GET['char']);
var_dump($selectedChar);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $selectedChar[0]['nme_personagem'] ?></title>
</head>
<body id="char-page">
<h1><?= RPG_NAME ?></h1>
<h2><?= $selectedChar[0]['nme_personagem'] ?></h2>
<?php
include '../Table/menu.php';
?>
<div class="col-xs-6 offset-2">
    <?php
    $imgURL = $selectedChar[0]['img_personagem'];
    echo '<img src="'.$imgURL.'">'
    ?>

</div>
</body>
</html>