<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/04/18
 * Time: 13:29
 */
require('../../../config.php');
include('../../../header.php');

var_dump($_POST);
if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    if (isset($_POST['magic']) && isset($_POST['remove-Magic']) && $_POST['remove-Magic'] == "Remover") {
        var_dump('hit remover');
        //TODO:Método para remover a magia selecionada da ficha do personagem.
    } else if (isset($_POST['new-Magic']) && isset($_POST['add-Magic']) && $_POST['add-Magic'] == "Adicionar") {
        var_dump('hit adicionar');
        //TODO: Método para adicionar a magia a ficha do personagem.
    }else{
        //TODO: mostrar a mensagem de erro: "selecione pelo menos uma magia".
    }
}
