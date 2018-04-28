<?php
require('../../../config.php');
include('../../../header.php');

if (isset($_POST['equipmentName']) && isset($_POST['equipmentDesc']) && isset($_POST['equipmentType'])&& isset($_POST['equipmentModBase'])) {
    $equipment = new Equipment();
    if ($equipment->updateEquipment($_POST['idt'], $_POST['equipmentName'], $_POST['equipmentDesc'], $_POST['equipmentType'], $_POST['equipmentModBase']))
        header('Location:' . URL . 'view/adm/Equipment/index.php?success=2');
}


if (!isset($_GET['idt'])) {
    header('Location:' . URL . 'view/adm/Equipment/index.php?error=2');
} else {
    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {
        
        $equipment = new Equipment();
        $singleEquipment = $equipment->selectAll("idt_equipamento = '" . $_GET['idt'] . "'");
        ?>
        <head>
            <title>RPG_Unnamed - Editar equipamento</title>
        </head>
        <body id="equipment-edit">

    <h1><?= RPG_NAME ?></h1>
    <h2>Editar equipamento</h2>
    
    <?php
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <form method="post" id="edit-equipment-form">
            <input type="hidden" id="idt" name="idt" value="<?= $singleEquipment[0]['idt_equipamento'] ?>">
            <label for="equipmentName">Equipamento</label>
            <input class="form-control" type="text" id="equipmentName" name="equipmentName"
                   value="<?= $singleEquipment[0]['nme_equipamento'] ?>">

            <label for="equipmentDesc">Descrição do equipamento</label>
            <textarea class="form-control" name="equipmentDesc" id="equipmentDesc"
                      form="edit-equipment-form"><?= $singleEquipment[0]['dsc_equipamento'] ?></textarea>

            <label for="equipmentType">Tipo de equipamento</label>
                    <select class="form-control" id="equipmentType" name="equipmentType">
                        <?php
                        $typeEquipment = array('A' => 'Ataque', 'D' => 'Defesa');
                        foreach ($typeEquipment as $key => $type) {
                            if ($singleEquipment[0]['tpo_equipamento'] == $key) {
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
            <label for="equipmentModBase">Modificador base equipamento</label>
            <input class="form-control" type="text" id="equipmentModBase" name="equipmentModBase"
                   value="<?= $singleEquipment[0]['mod_base_equipamento'] ?>">
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
        <?php
    }
    
}