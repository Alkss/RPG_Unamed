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
    //Remove item
    if (isset($_POST['usable']) && isset($_POST['remove-Usable']) && $_POST['remove-Usable'] == "Remover") {
        $itemClass = new Item();
        $deleteUsable = "";
        foreach ($_POST['usable'] as $singleItem) {
            $deleteUsable .= $singleItem . ',';
        }
        $deleteUsable = rtrim($deleteUsable, ', ');
        if ($itemClass->removeItemFromChar($_GET['char'], $deleteUsable)) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
        //Adiciona item
    } else if (isset($_POST['new-Usable']) && isset($_POST['add-Usable']) && $_POST['add-Usable'] == "Adicionar") {
        $itemClass = new Item();
        if ($itemClass->addItemAtChar($_GET['char'], $_POST['new-Usable'])) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
        //Redireciona caso não seja selecionada nenhuma opção.
    } else {
        header("Location:../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "&error=1");
    }
}
