<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/04/18
 * Time: 08:00
 */
require('../../../config.php');
include('../../../header.php');

if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    $char = new Character();
    $selectedChar = $char->selectAll("idt_personagem = " . $_GET['char']);
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Editar Pertences</title>
    </head>
    <body id="editItens">
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo "<script type='text/javascript'>";
        echo "alert('Selecione alguma magia');";
        echo "</script>";
    }
    ?>

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar pertences de <span style="color:white"><?= $selectedChar[0]['nme_personagem'] ?></span></h2>
    <?php
    include "../Table/menu.php";
    ?>
    <div class="col-xs-10">
        <div class="row">
            <div class="col-xs-6">
                <h6>Magias</h6>
                <?php
                $magic = new Magic();
                $charMagic = $magic->selectCharMagic("idt_personagem = " . $_GET['char']);
                $allMagic = $magic->selectAll();
                $availableMagic = $magic->selectNotInChar($_GET['char']);
                include "magic/magicPage.php";
                ?>
            </div>

            <div class="col-xs-6">
                <h6>Utilizaveis</h6>
                <?php
                $item = new Item();
                $charItem = $item->selectCharItem($_GET['char']);
                $availableItem = $item->selectAvailableItem($_GET['char']);
                include "item/itemPage.php";
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <h6>Equipamentos</h6>
                <?php
                $equip = new Equipment();
                $charEquip = $equip->selectCharEquip($_GET['char']);
                $availableEquip = $equip->selectAvailableEquip($_GET['char']);
                include "equipment/equipPage.php";
                ?>
            </div>

            <div class="col-xs-6">
                <h6>Atributos</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <h6>Personalizados</h6>

            </div>

            <div class="col-xs-6">
                <h6>Criar um pertence personalizado</h6>
            </div>
        </div>
    </div>
    </body>
    <script>
        function checkAll(ele, classe) {
            var checkboxes = document.getElementsByClassName(classe);
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    console.log(i)
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }
    </script>
    </html>
    <?php
}
