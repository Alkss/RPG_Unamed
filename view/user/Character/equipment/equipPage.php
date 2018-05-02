<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/05/18
 * Time: 09:57
 */
?>
<form action="Character/../helper/equipManager.php?idt=<?= $_GET['idt'] ?>&char=<?= $_GET['char'] ?>" method="post">
    <?php
    if ($charEquip) {
        ?>
        <table id="notLeft">
            <thead>
            <tr>
                <td><input type="checkbox" onchange="checkAll(this,'equip')" name="chk[]"/>
                </td>
                <td>Nome</td>
                <td>Valor Base</td>
                <td>Tipo</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($charEquip as $singleEquip) {
                ?>
                <tr>
                    <td><input class="equip" type="checkbox" name="equip[]"
                               value="<?= $singleEquip['idt_equipamento'] ?>">
                    <td><?= $singleEquip['nme_equipamento'] ?></td>
                    <td><?= $singleEquip['tpo_equipamento'] ?></td>
                    <td><?= $singleEquip['mod_base_equipamento'] ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
        
    } else {
        ?>
        <h6><span style="color: darkgray;">--Sem equipamentos--</span></h6>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-xs-5 col-xs-offset-2">
            <select id="new-Equip" name="new-Equip" class="form-control" required="required">
                <option selected="selected" disabled="disabled" hidden="hidden">Selecione uma opção
                </option>
                <?php
                if ($availableEquip) {
                    foreach ($availableEquip as $uniqueEquip) {
                        ?>
                        <option value="<?= $uniqueEquip['idt_equipamento'] ?>"><?= $uniqueEquip['nme_equipamento'] ?></option>
                        <?php
                    }
                } else {
                    ?>
                    <option disabled="disabled">Nenhum equipamento disponível</option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-xs-2">
            <input type="submit" class="btn btn-primary" value="Adicionar" id="add-Equip"
                   name="add-Equip">
        
        </div>
        <div class="col-xs-2">
            <?php
            if ($charEquip) {
                ?>
                <input type="submit" name="remove-Equip" id="remove-Equip" class="btn btn-secondary"
                       value="Remover">
                <?php
            } else {
                ?>
                <input disabled="disabled" type="submit" name="remove-Equip" id="remove-Equip"
                       class="btn btn-secondary"
                       value="Remover">
                <?php
            }
            ?>
        </div>
    </div>
</form>
