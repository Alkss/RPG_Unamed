<?php

require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
    header('location:' . URL . '/view/index.php');
} else {
    
    if (isset($_POST['magicName']) && isset($_POST['magicDesc']) && isset($_POST['magicType'])&& isset($_POST['magicModBase'])) {
        $magic = new Magic();
        
        if ($magic->createMagic($_POST['magicName'], $_POST['magicDesc'], $_POST['magicType'], $_POST['magicModBase'])) {
            header('Location: addMagic.php?success=1');
        }
    }
    
    
    ?>
    <head>
        <title>RPG_Unnamed - Novo Magia</title>
    </head>
    <body id="new-magic">

<h1><?= RPG_NAME ?></h1>
<h2>Novo Magia</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Magia criado com sucesso!</p></div>
        <?php
    } else {
        ?>
        <div class="alert alert-error"><p>Erro na criação da magia!</p></div>
        <?php
    }
}
include '../menuADM.php';
?>
<div class="col-xs-5">
    <form method="post" id="create-new-magic">
        <p>
            <label for="magicName">Magia</label>
            <input class="form-control" type="text" id="magicName" name="magicName">
        </p>
        <p>
            <label for="magicDesc">Descrição do magia</label>
        </p>
        <textarea class="form-control" form="create-new-magic" id="magicDesc" name="magicDesc"
                  style="height: 180px"></textarea>
        <p>
        <label for="magicType">Tipo de magia</label>
            <select class="form-control" id="magicType" name="magicType">
                <option selected disabled="disabled" hidden>Escolha um tipo</option>
                <option value="A">Ataque</option>
                <option value="D">Defesa</option>
            </select>
        </p>
        <p>
            <label for="magicModBase">Modificador base da magia</label>
            <input class="form-control" type="text" id="magicModBase" name="magicModBase">
        </p>
        <button class="btn btn-primary" id="createMagic" name="createMagic">Adicionar magia</button>
    </form>
</div>
    <?php
}
