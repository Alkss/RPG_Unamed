<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/01/18
 * Time: 14:44
 */
require('../../config.php');
include('../../header.php');


if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    ?>
    <head>
        <title><?= RPG_NAME ?></title>
    </head>
    <body id="home-page-user">
    <h1><?= RPG_NAME ?></h1>
    <h2>Bem Vindo!</h2>
    <?php
    if ((isset($_GET['success'])) && ($_GET['success'] == 1)) {
        ?>
        <div class="alert alert-success" id="sucessTable">Mesa criada com sucesso</div>
        <?php
    }
    ?>
    <div class="container">
        
        <h3>Personagens</h3>
        <div id="recent-chars">
            <iframe src="Table/showRecentChars.php" id="tableIframe"></iframe>
        </div>
        
        <h3>Mesas Recentes</h3>
        <div id="recent-tables">
            <iframe src="Table/showRecentTables.php" id="tableIframe"></iframe>
        </div>

        
        
        <h3>Minhas Mesas</h3>
        <div id="show-tables">
            <iframe src="Table/showTables.php" id="tableIframe"></iframe>
        </div>

        <div id="menu">
            <a class="btn btn-primary pull-right" href="Table/createTable.php">Criar nova mesa</a>
        </div>
    </div>
    </body>
    <?php
}