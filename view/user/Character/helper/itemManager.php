<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/04/18
 * Time: 13:29
 */
require('../../../../config.php');
include('../../../../header.php');
if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    var_dump($_POST);die;
    if (isset($_POST['usable']) && isset($_POST['remove-Usable']) && $_POST['remove-Usable'] == "Remover") {
        $magicClass = new Magic();
        $deleteMagic = "";
        foreach ($_POST['usable'] as $singleMagic) {
            $deleteMagic .= $singleMagic . ',';
        }
        $deleteMagic = rtrim($deleteMagic, ', ');
        if ($magicClass->removeMagicFromChar($_GET['char'], $deleteMagic)) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
    } else if (isset($_POST['new-Magic']) && isset($_POST['add-Magic']) && $_POST['add-Magic'] == "Adicionar") {
        $magicClass = new Magic();
        if ($magicClass->addMagicAtChar($_GET['char'], $_POST['new-Magic'])) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
    } else {
        header("Location:../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "&error=1");
    }
}
