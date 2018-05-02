<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/05/18
 * Time: 09:57
 */
?>
<form action="Character/../helper/attrManager.php?idt=<?= $_GET['idt'] ?>&char=<?= $_GET['char'] ?>" method="post">
    <?php
    if ($charAttr) {
        ?>
        <table id="notLeft">
            <thead>
            <tr>
                <td><input type="checkbox" onchange="checkAll(this,'attr')" name="chk[]"/>
                </td>
                <td>Nome</td>
                <td id="attributeHead">Valor</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($charAttr as $singleAttr) {
                ?>
                <tr>
                    <td><input class="attr" type="checkbox" name="attr[]"
                               value="<?= $singleAttr['idt_atributo'] ?>"></td>
                    <td><?= $singleAttr['nme_atributo'] ?></td>
                    <td id="attributeInput"><input name="attr-value[<?= $singleAttr['idt_atributo'] ?>]" type="number"
                                                   min="0" max="30" step="1" class="form-control"
                                                   value="<?= $singleAttr['val_personagem_atributo'] ?>"></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
        
    } else {
        ?>
        <h6><span style="color: darkgray;">--Sem atributos--</span></h6>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-xs-3 col-xs-offset-2">
            <select id="new-Attribute" name="new-Attribute" class="form-control" required="required">
                <option selected="selected" disabled="disabled" hidden="hidden">Selecione uma opção
                </option>
                <?php
                if ($availableAttr) {
                    foreach ($availableAttr as $uniqueAttr) {
                        ?>
                        <option value="<?= $uniqueAttr['idt_atributo'] ?>"><?= $uniqueAttr['nme_atributo'] ?></option>
                        <?php
                    }
                } else {
                    ?>
                    <option disabled="disabled">Nenhum atributo disponível</option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-xs-2">
            <input type="submit" class="btn btn-primary" value="Adicionar" id="add-Attribute"
                   name="add-Attribute">

        </div>
        <div class="col-xs-2">
            <input type="submit" class="btn btn-primary" value="Atualizar" id="att-Attribute"
                   name="att-Attribute">

        </div>
        <div class="col-xs-2">
            <?php
            if ($charAttr) {
                ?>
                <input type="submit" name="remove-Attribute" id="remove-Attribute" class="btn btn-secondary"
                       value="Remover">
                <?php
            } else {
                ?>
                <input disabled="disabled" type="submit" name="remove-Attribute" id="remove-Attribute"
                       class="btn btn-secondary"
                       value="Remover">
                <?php
            }
            ?>
        </div>
    </div>
</form>
