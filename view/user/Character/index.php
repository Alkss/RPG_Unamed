<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23/04/18
 * Time: 16:50
 */
require('../../../config.php');
include('../../../header.php');

if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    
    $db = new DataBase();
    $char = new Character();
    
    $selectedChar = $char->selectAll("idt_personagem = " . $_GET['char']);
    $race = $char->selectRace("idt_personagem = " . $_GET['char']);
    $class = $char->selectClass("idt_personagem = " . $_GET['char']);
    $alignment = $char->selectAlignment("idt_personagem = " . $_GET['char']);
    $divinity = $char->selectDivinity("idt_personagem = " . $_GET['char']);
    $lang = $char->selectLang("idt_personagem = " . $_GET['char']);
    $equip = $char->selectEquip("idt_personagem = " . $_GET['char']);
    $magic = $char->selectMagic("idt_personagem = " . $_GET['char']);
    $usables = $char->selectUsables("idt_personagem = " . $_GET['char']);
    $attribute = $char->selectAttribute("idt_personagem = " . $_GET['char']);
    
    
    $tableInfo = $db->search("SELECT cod_papel_sala FROM tb_usuario JOIN ta_perfil_sala ON idt_usuario=cod_usuario JOIN tb_sala ON idt_sala=cod_sala WHERE cod_sala='" . $_GET['idt'] . "' AND cod_usuario=".$_SESSION['idt_usuario']);
    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $selectedChar[0]['nme_personagem'] ?></title>
    </head>
    <body id="char-page">
    <h1><?= RPG_NAME ?></h1>
    <h2>Ficha de <span style="color:white"><?= $selectedChar[0]['nme_personagem'] ?></span></h2>
    <?php
    include '../Table/menu.php';
    ?>
    <div class="col-xs-6">
        <div class="row">
            <div class="col-xs-6" id="char-img">
                <?php
                $imgURL = $selectedChar[0]['img_personagem'];
                echo '<img id="charImg" src="' . $imgURL . '">'
                ?>
            </div>
            <div class="col-xs-6">
                <a class="btn btn-primary" href="editCharacter.php?char=<?= $_GET['char'] ?>&idt=<?= $_GET['idt'] ?>">Editar
                    dados</a>
                <?php
                if ($tableInfo[0]['cod_papel_sala'] != 1){
                    ?>
                    <a class="btn btn-primary" href="editItens.php?idt=<?=$_GET['idt']?>&char=<?=$_GET['char']?>">Editar pertences</a>
                    <a class="btn btn-primary" onclick="return confirm('Deseja realmente deletar o personagem ')"
                       href="deleteCharacter.php?idt=<?= $_GET['idt'] ?>&char=<?= $_GET['char'] ?>">Excluir</a>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <table>
                <tr>
                    <th>Raça:</th>
                    <th>Classe:</th>
                    <th>Gênero:</th>
                    <th>Alinhamento:</th>
                    <th>Cor dos Olhos:</th>
                    <th>Altura:</th>
                    <th>Peso:</th>
                </tr>
                <tr>
                    <td><?= $race[0]['nme_raca'] ?></td>
                    <td><?= $class[0]['nme_classe'] ?></td>
                    <td><?php
                        if ($selectedChar[0]['gen_personagem'] == 'M') {
                            ?>
                            Masculino
                            <?php
                        } else {
                            ?>
                            Feminino
                            <?php
                        }
                        ?>
                    </td>
                    <td><?= $alignment[0]['nme_alinhamento'] ?></td>
                    <td><?= $selectedChar[0]['cor_olho_personagem'] ?></td>
                    <td><?= $selectedChar[0]['alt_personagem'] ?>M</td>
                    <td><?= $selectedChar[0]['pes_personagem'] ?>Kg</td>
                </tr>
                <tr>
                    <th colspan="7" id="histHead">História</th>
                </tr>
                <tr>
                    <td colspan="7" id="histBody"><?= $selectedChar[0]['hst_personagem'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-xs-4" id="righ-side-table">
        <div class="row">

            <h5>Divindades</h5>
            <?php
            if ($divinity) {
                foreach ($divinity as $singleDivinity) {
                    ?>
                    <h6><?= $singleDivinity['nme_divindade'] ?></h6>
                    
                    <?php
                }
            } else {
                ?>
                <h6>-- Nenhuma --</h6>
                <?php
            }
            ?>
        </div>
        <div class="row">
            <h5>Idiomas</h5>
            <?php
            if ($lang) {
                foreach ($lang as $singleLang) {
                    ?>
                    <h6><?= $singleLang['nme_linguagem'] ?></h6>
                    <?php
                }
            } else {
                ?>
                <h6>-- Nenhuma --</h6>
                <?php
            }
            ?>
        </div>
        <div class="row">
            <h5>Equipamento</h5>
            <?php
            if ($equip) {
            ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Valor Base</th>
                    <th>Tipo</th>
                </tr>
                <?php
                foreach ($equip as $singleEquip) {
                    ?>
                    <tr>
                        <td><?= $singleEquip['nme_equipamento'] ?></td>
                        <td><?= $singleEquip['mod_base_equipamento'] ?></td>
                        <td><?= $singleEquip['tpo_equipamento'] ?></td>
                    </tr>
                    <?php
                }
                } else {
                    ?>
                    <h6>-- Nenhum --</h6>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="row">
            <h5>Magias</h5>
            <?php
            if ($magic) {
            ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Valor Base</th>
                    <th>Tipo</th>
                </tr>
                <?php
                foreach ($magic as $singleMagic) {
                    ?>
                    <tr>
                        <td><?= $singleMagic['nme_magia'] ?></td>
                        <td><?= $singleMagic['mod_base_magia'] ?></td>
                        <td><?= $singleMagic['tpo_magia'] ?></td>
                    </tr>
                    <?php
                }
                } else {
                    ?>
                    <h6>-- Nenhuma --</h6>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="row">
            <h5>Utilizáveis</h5>
            <?php
            if ($usables) {
                ?>
                <?php
                foreach ($usables as $singleUsable) {
                    ?>
                    <h6><?= $singleUsable['nme_item'] ?></h6>
                    <?php
                }
            } else {
                ?>
                <h6>-- Nenhum --</h6>
                <?php
            }
            ?>
        </div>
        <div class="row">
            <h5>Atributos</h5>
            <?php
            if ($attribute) {
                ?>
                <div id="attributes">
                    <?php
                    foreach ($attribute as $singleAttribute) {
                        ?>
                        <h6><?= $singleAttribute['nme_atributo'] ?>
                            : <?= $singleAttribute['val_personagem_atributo'] ?></h6>
                        <?php
                    }
                    ?>
                </div>
                <?php
            } else {
                ?>
                <h6>-- Nenhum --</h6>
                <?php
            }
            ?>
        </div>
    </div>
    </body>
    </html>
    <?php
}