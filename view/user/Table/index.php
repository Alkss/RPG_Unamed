<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08/02/18
 * Time: 20:00
 */
require('../../../config.php');
include('../../../header.php');

if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    
    $db = new DataBase();
    $tableInfo = $db->search("SELECT * FROM tb_usuario JOIN ta_perfil_sala ON idt_usuario=cod_usuario JOIN tb_sala ON idt_sala=cod_sala WHERE cod_sala='" . $_GET['idt'] . "'");
    
    if ($tableInfo[0]['cod_usuario'] != $_SESSION['idt_usuario']) {
        $db->executeQuery("INSERT INTO `ta_perfil_sala`(`cod_usuario`, `cod_personagem`, `cod_papel_sala`, `cod_sala`)
VALUES ('" . $db->scapeCont($_SESSION['idt_usuario']) . "',
        '',
        '" . '3' . "',
        '" . $db->scapeCont($_GET['idt']) . "'");
    }
    
     $db->search("SELECT * FROM tb_personagem JOIN ta_perfil_sala ON idt_personagem=cod_personagem WHERE idt_perfil_sala='" . $db->scapeCont($_GET['idt']) . "'");
    
    die;
    ?>
    <body id="table-home">
    <h1><?= RPG_NAME ?></h1>

    <h2>Mesa de <?= $tableInfo[0]['nme_usuario'] ?></h2>
    <div class="col-xs-4">
        <?php include 'menu.php'; ?>
    </div>

    </body>
    <?php
}
