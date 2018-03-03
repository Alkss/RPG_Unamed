<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/02/18
 * Time: 19:28
 */
require('../../../config.php');
include('../../../header.php');

if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
}

if (isset($_POST['name']) && isset($_POST['nPlayers']) && isset($_POST['campaign'])) {
    $table = new Table();
    if ($table->createTable($_POST['name'], $_POST['campaign'], $_POST['password'], $_POST['nPlayers'])) {
        header('Location: ../index.php?success=1');
    } else {
        ?>
        <div class="alert alert-warning">O nome da mesa já existe, por favor selecione outro.</div>
        <?php
        include 'createTableAuxPost.php';
    }
} else {
    include 'createTableAux.php';
}
