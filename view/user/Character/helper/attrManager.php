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
    if (isset($_POST['attr']) && isset($_POST['remove-Attribute']) && $_POST['remove-Attribute'] == "Remover") {
        $attrClass = new Attribute();
        $deleteAttr = "";
        foreach ($_POST['attr'] as $singleAttr) {
            $deleteAttr .= $singleAttr . ',';
        }
        $deleteEquip = rtrim($deleteAttr, ', ');
        if ($attrClass->removeAttributeFromChar($_GET['char'], $deleteEquip)) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
        //Adiciona item
    } else if (isset($_POST['new-Attribute']) && isset($_POST['add-Attribute']) && $_POST['add-Attribute'] == "Adicionar") {
        $attrClass = new Attribute();
        if ($attrClass->addAttributeAtChar($_GET['char'], $_POST['new-Attribute'])) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
        //Redireciona caso não seja selecionada nenhuma opção.
    } else if(isset($_POST['attr-value']) && isset($_POST['att-Attribute']) && $_POST['att-Attribute']=="Atualizar") {
        $attrClass = new Attribute();
        if($attrClass->updateCharAttribute($_GET['char'], $_POST['attr-value'])){
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
    } else {
        header("Location:../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "&error=4");
    }
}
