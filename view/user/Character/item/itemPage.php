<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/04/18
 * Time: 16:24
 */
?>
<form action="Character/../helper/itemManager.php?idt=<?= $_GET['idt'] ?>&char=<?= $_GET['char'] ?>" method="post">
    <?php
    if ($charItem) {
        ?>
        <table id="notLeft">
            <thead>
            <tr>
                <td><input type="checkbox" onchange="checkAll(this,'usable')" name="chk[]"/>
                </td>
                <td>Nome</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($charItem as $singleItem) {
                ?>
                <tr>
                    <td><input class="usable" type="checkbox" name="magic[]"
                               value="<?= $singleItem['idt_item'] ?>">
                    <td><?= $singleItem['nme_item'] ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
        
    } else {
        ?>
        <h6><span style="color: darkgray;">--Sem items--</span></h6>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-xs-5 col-xs-offset-2">
            <select id="new-Magic" name="new-Magic" class="form-control" required="required">
                <option selected="selected" disabled="disabled" hidden="hidden">Selecione uma opção
                </option>
                <?php
                if ($availableItem) {
                    foreach ($availableItem as $uniqueItem) {
                        ?>
                        <option value="<?= $uniqueItem['idt_item'] ?>"><?= $uniqueItem['nme_item'] ?></option>
                        <?php
                    }
                } else {
                    ?>
                    <option disabled="disabled">Nenhum item disponível</option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-xs-2">
            <input type="submit" class="btn btn-primary" value="Adicionar" id="add-Magic"
                   name="add-Magic">
        
        </div>
        <div class="col-xs-2">
            <?php
            if ($charItem) {
                ?>
                <input type="submit" name="remove-Magic" id="remove-Magic" class="btn btn-secondary"
                       value="Remover">
                <?php
            } else {
                ?>
                <input disabled="disabled" type="submit" name="remove-Magic" id="remove-Magic"
                       class="btn btn-secondary"
                       value="Remover">
                <?php
            }
            ?>
        </div>
    </div>
</form>
