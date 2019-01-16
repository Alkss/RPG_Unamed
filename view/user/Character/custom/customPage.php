<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/05/18
 * Time: 09:57
 */
?>
<form action="Character/../helper/customManager.php?idt=<?= $_GET['idt'] ?>&char=<?= $_GET['char'] ?>" method="post">
    <?php
    if ($charCustom) {
        ?>
        <table id="notLeft">
            <thead>
            <tr>
                <td><input type="checkbox" onchange="checkAll(this,'custom')" name="chk[]"/>
                </td>
                <td>Nome</td>
                <td>Descrição</td>
                <td>Tipo</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($charCustom as $singleCustom) {
                ?>
                <tr>
                    <td><input class="custom" type="checkbox" name="custom[]"
                               value="<?= $singleCustom['idt_custom'] ?>"></td>
                    <td style="width: 35%"><?= $singleCustom['nme_custom'] ?></td>
                    <td style="width: 40%; padding-left: 15px"><?= $singleCustom['dsc_custom'] ?></td>
                    <td><?php
                        if ($singleCustom['tpo_custom'] == "M") {
                            $customType = "Magia";
                        } else if ($singleCustom['tpo_custom'] == "E") {
                            $customType = "Equipamento";
                        } else {
                            $customType = "Item";
                        }
                        echo $customType;
                        ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
        
    } else {
        ?>
        <h6><span style="color: darkgray;">--Sem personalizados--</span></h6>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-xs-5 col-xs-offset-2">
            <select id="new-Custom" name="new-Custom" class="form-control" required="required">
                <option selected="selected" disabled="disabled" hidden="hidden">Selecione uma opção
                </option>
                <?php
                if ($availableCustom) {
                    foreach ($availableCustom as $uniqueCustom) {
                        ?>
                        <option value="<?= $uniqueCustom['idt_custom'] ?>"><?= $uniqueCustom['nme_custom'] ?></option>
                        <?php
                    }
                } else {
                    ?>
                    <option disabled="disabled">Nenhum personalizado disponível</option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-xs-2">
            <input type="submit" class="btn btn-primary" value="Adicionar" id="add-Custom"
                   name="add-Custom">

        </div>
        <div class="col-xs-2">
            <?php
            if ($charCustom) {
                ?>
                <input type="submit" name="remove-Custom" id="remove-Custom" class="btn btn-secondary"
                       value="Remover">
                <?php
            } else {
                ?>
                <input disabled="disabled" type="submit" name="remove-Custom" id="remove-Custom"
                       class="btn btn-secondary"
                       value="Remover">
                <?php
            }
            ?>
        </div>
    </div>
</form>
