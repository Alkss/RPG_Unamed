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
$selectedChar = $char->selectAll("idt_personagem = " . $_GET['idt']);
var_dump($selectedChar);
?>

