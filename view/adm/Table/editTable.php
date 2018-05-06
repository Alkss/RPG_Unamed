<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/01/18
 * Time: 19:53
 */
require('../../../config.php');
include('../../../header.php');

if (isset($_POST['idt']) && isset($_POST['name']) && isset($_POST['campaign']) && isset($_POST['nPlayers'])) {
    $table = new Table();
     echo $table->updateTable($_POST['idt'], $_POST['name'], $_POST['campaign'], $_POST['password'], $_POST['nPlayers']); 
        header('Location:' . URL . 'view/adm/Table/index.php?success=2');
        header('Location:index.php?success=2');
} else {
        $table = new Table();
        $singleTable = $table->selectAll("idt_sala = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title>RPG_Unnamed - Editar mesa</title>
        </head>
        <body id="table-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar mesas</h2>
    
    <?php
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-table-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleTable[0]['idt_sala'] ?>">
           
            <label for="name">Mesa</label>
             <p>
            <input class="form-control" type="text" id="name" name="name"
                   value="<?= $singleTable[0]['nme_sala'] ?>">
            </p>
            
            
            <label for="nPlayers">Quantidade de jogadores</label>
            <p>
            <input type="number" name="nPlayers" id="nPlayers" value="<?= $singleTable[0]['qtd_players_sala'] ?>">
            </p>
            
            <label for="campaign">História da campanha</label>
            <p>
            <textarea name="campaign" id="campaign" ><?= $singleTable[0]['hst_campanha_sala'] ?></textarea>
            </p>
            
            <label for="password">Senha</label><br>
            <p>
            <input type="password" name="password" id="password" value="<?= $singleTable[0]['pwd_sala'] ?>">
            </p>
            
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }