<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/04/18
 * Time: 13:29
 */
require('../../../../config.php');
include('../../../../header.php');

var_dump($_POST);
if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    if (isset($_POST['magic']) && isset($_POST['remove-Magic']) && $_POST['remove-Magic'] == "Remover") {
        var_dump('hit remover');
        //TODO:Método para remover a magia selecionada da ficha do personagem.
        
        
        $magicClass = new Magic();
        $deleteMagic = "";
        foreach ($_POST['magic'] as $singleMagic) {
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
        var_dump('hit adicionar');
        //TODO: Método para adicionar a magia a ficha do personagem.
    } else {
        //TODO: mostrar a mensagem de erro: "selecione pelo menos uma magia".
    }
}
