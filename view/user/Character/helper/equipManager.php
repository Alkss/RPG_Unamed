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
    if (isset($_POST['equip']) && isset($_POST['remove-Equip']) && $_POST['remove-Equip'] == "Remover") {
        $equipClass = new Equipment();
        $deleteEquip = "";
        foreach ($_POST['equip'] as $singleEquip) {
            $deleteEquip .= $singleEquip . ',';
        }
        $deleteEquip = rtrim($deleteEquip, ', ');
        if ($equipClass->removeEquipFromChar($_GET['char'], $deleteEquip)) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
        //Adiciona item
    } else if (isset($_POST['new-Equip']) && isset($_POST['add-Equip']) && $_POST['add-Equip'] == "Adicionar") {
        $equipClass = new Equipment();
        if ($equipClass->addEquipAtChar($_GET['char'], $_POST['new-Equip'])) {
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
