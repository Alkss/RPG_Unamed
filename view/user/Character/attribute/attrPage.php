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
                <td>Modificador</td>
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
                    <td style="text-align: center"><?php
                        $modValue = 0;
                        if ($singleAttr['val_personagem_atributo'] == 1)
                            $modValue = -5;
                        else if ($singleAttr['val_personagem_atributo'] == 2 || ($singleAttr['val_personagem_atributo'] == 3))
                            $modValue = -4;
                        else if ($singleAttr['val_personagem_atributo'] == 4 || ($singleAttr['val_personagem_atributo'] == 5))
                            $modValue = -3;
                        else if ($singleAttr['val_personagem_atributo'] == 6 || ($singleAttr['val_personagem_atributo'] == 7))
                            $modValue = -2;
                        else if ($singleAttr['val_personagem_atributo'] == 8 || ($singleAttr['val_personagem_atributo'] == 9))
                            $modValue = -1;
                        else if ($singleAttr['val_personagem_atributo'] == 10 || ($singleAttr['val_personagem_atributo'] == 11))
                            $modValue = 0;
                        else if ($singleAttr['val_personagem_atributo'] == 12 || ($singleAttr['val_personagem_atributo'] == 13))
                            $modValue = 1;
                        else if ($singleAttr['val_personagem_atributo'] == 14 || ($singleAttr['val_personagem_atributo'] == 15))
                            $modValue = 2;
                        else if ($singleAttr['val_personagem_atributo'] == 16 || ($singleAttr['val_personagem_atributo'] == 17))
                            $modValue = 3;
                        else if ($singleAttr['val_personagem_atributo'] == 18 || ($singleAttr['val_personagem_atributo'] == 19))
                            $modValue = 4;
                        else if ($singleAttr['val_personagem_atributo'] == 20 || ($singleAttr['val_personagem_atributo'] == 21))
                            $modValue = 5;
                        else if ($singleAttr['val_personagem_atributo'] == 22 || ($singleAttr['val_personagem_atributo'] == 23))
                            $modValue = 6;
                        else if ($singleAttr['val_personagem_atributo'] == 24 || ($singleAttr['val_personagem_atributo'] == 25))
                            $modValue = 7;
                        else if ($singleAttr['val_personagem_atributo'] == 27 || ($singleAttr['val_personagem_atributo'] == 26))
                            $modValue = 8;
                        else if ($singleAttr['val_personagem_atributo'] == 28 || ($singleAttr['val_personagem_atributo'] == 29))
                            $modValue = 9;
                        else if ($singleAttr['val_personagem_atributo'] == 30)
                            $modValue = 10;
                        
                        if ($modValue > 0) {
                            $modValue = '+' . $modValue;
                        }
                        echo $modValue;
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
