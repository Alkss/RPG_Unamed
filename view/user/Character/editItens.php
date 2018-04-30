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
    
    $magic = new Magic();
    $charMagic = $magic->selectCharMagic("idt_personagem = " . $_GET['char']);
    $allMagic = $magic->selectAll();
    
    var_dump($charMagic);
    var_dump($allMagic);
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
    <h1><?= RPG_NAME ?></h1>
    <h2>Editar pertences de <span style="color:white"><?= $selectedChar[0]['nme_personagem'] ?></span></h2>
    <?php
    include "../Table/menu.php";
    ?>
    <div class="col-xs-10">
        <div class="row">
            <div class="col-xs-6">
                <h6>Magias</h6>
                <form action="magicManager.php?idt=<?= $_GET['idt'] ?>&char=<?= $_GET['char'] ?>" method="post">
                    <?php
                    if ($charMagic) {
                        ?>
                        <table>
                            <thead>
                            <tr>
                                <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                                <td>Magia</td>
                                <td>Valor Base</td>
                                <td>Tipo</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($charMagic as $singleMagic) {
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="magic[]"
                                               value="<?= $singleMagic['idt_personagem_magia'] ?>">
                                    <td><?= $singleMagic['nme_magia'] ?></td>
                                    <td><?= $singleMagic['mod_base_magia'] ?></td>
                                    <td><?= $singleMagic['tpo_magia'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-xs-5 col-xs-offset-2">
                                <select id="new-Magic" name="new-Magic" class="form-control" required="required">
                                    <option selected disabled="disabled" hidden="hidden">Selecione uma opção
                                    </option>
                                    <?php
                                    foreach ($allMagic as $uniqueMagic) {
                                        ?>

                                        <option value="<?= $uniqueMagic['idt_magia'] ?>"><?= $uniqueMagic['nme_magia'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <input type="submit" class="btn btn-primary" value="Adicionar" id="add-Magic"
                                       name="add-Magic">

                            </div>
                            <div class="col-xs-2">
                                <input type="submit" name="remove-Magic" id="remove-Magic" class="btn btn-secondary"
                                       value="Remover">
                            </div>
                        </div>
                        <?php
                        
                    } else {
                        ?>
                        <h6>Sem magias</h6>
                        <?php
                    }
                    ?>
                </form>
            </div>

            <div class="col-xs-6">
                <h6>Utilizaveis</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <h6>Equipamentos</h6>

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
        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
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
