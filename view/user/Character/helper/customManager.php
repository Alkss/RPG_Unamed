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
    if (isset($_POST['custom']) && isset($_POST['remove-Custom']) && $_POST['remove-Custom'] == "Remover") {
        $customClass = new Custom();
        $deleteCustom = "";
        foreach ($_POST['custom'] as $singleCustom) {
            $deleteCustom .= $singleCustom . ',';
        }
        $deleteCustom = rtrim($deleteCustom, ', ');
        if ($customClass->removeCustomFromChar($_GET['char'], $deleteCustom)) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
        //Adiciona item
    } else if (isset($_POST['new-Custom']) && isset($_POST['add-Custom']) && $_POST['add-Custom'] == "Adicionar") {
        $customClass = new Custom();
        if ($customClass->addCustomAtChar($_GET['char'], $_POST['new-Custom'])) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
        //Redireciona caso não seja selecionada nenhuma opção.
    } else if (isset($_POST['add-new-Custom']) && $_POST['add-new-Custom'] == "Criar um personalizado") {
        $customClass = new Custom();
        if ($customClass->insertCustom($_GET['idt'], $_POST['new-custom-name'], $_POST['new-custom-desc'], $_POST['new-custom-type'], $_GET['char'])) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
    } else if (isset($_POST['add-Custom']) && $_POST['add-Custom'] == "Criar um personalizado") {
        $customClass = new Custom();
        if ($customClass->insertCustom($_GET['idt'], $_POST['new-custom-name'], $_POST['new-custom-desc'], $_POST['new-custom-type'], null)) {
            echo "<script type='text/javascript'>";
            echo "alert('Operação realizada com sucesso');";
            echo "window.location='../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "'";
            echo "</script>";
        }
    } else {
        header("Location:../editItens.php?idt=" . $_GET['idt'] . "&char=" . $_GET['char'] . "&error=1");
    }
}
