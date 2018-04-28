<?php
require('../../../config.php');
include('../../../header.php');

if (isset($_POST['magicName']) && isset($_POST['magicDesc']) && isset($_POST['magicType'])&& isset($_POST['magicModBase'])) {
    $magic = new Magic();
    if ($magic->updateMagic($_POST['idt'], $_POST['magicName'], $_POST['magicDesc'], $_POST['magicType'], $_POST['magicModBase']))
        header('Location:' . URL . 'view/adm/Magic/index.php?success=2');
}


if (!isset($_GET['idt'])) {
    header('Location:' . URL . 'view/adm/Magic/index.php?error=2');
} else {
    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {
        
        $magic = new Magic();
        $singleMagic = $magic->selectAll("idt_magia = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title>RPG_Unnamed - Editar magia</title>
        </head>
        <body id="magic-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar magia</h2>
    
    <?php
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-magic-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleMagic[0]['idt_magia'] ?>">
            <label for="magicName">Magia</label>
            <input class="form-control" type="text" id="magicName" name="magicName"
                   value="<?= $singleMagic[0]['nme_magia'] ?>">

            <label for="magicDesc">Descrição do magia</label>
            <textarea class="form-control" name="magicDesc" id="magicDesc"
                      form="edit-magic-form"><?= $singleMagic[0]['dsc_magia'] ?></textarea>

            <label for="magicType">Tipo de magia</label>
                    <select class="form-control" id="magicType" name="magicType">
                        <?php
                        $typeMagic = array('A' => 'Ataque', 'D' => 'Defesa');
                        foreach ($typeMagic as $key => $type) {
                            if ($singleMagic[0]['tpo_magia'] == $key) {
                                ?>
                                <option selected="selected"
                                        value="<?= $key ?>"><?= $type ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?= $key ?>"><?= $type ?></option>
                                <?php
                            }
                        }
                        ?>
            </select>
            <label for="magicModBase">Modificador base magia</label>
            <input class="form-control" type="text" id="magicModBase" name="magicModBase"
                   value="<?= $singleMagic[0]['mod_base_magia'] ?>">
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}