<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/04/18
 * Time: 16:24
 */
?>
<form action="Character/../helper/usableManager.php?idt=<?= $_GET['idt'] ?>&char=<?= $_GET['char'] ?>" method="post">
    <?php
    if ($charMagic) {
        ?>
        <table>
            <thead>
            <tr>
                <td><input type="checkbox" onchange="checkAll(this,'usable')" name="chk[]"/>
                </td>
                <td>Magia</td>
                <td>Valor Base</td>
                <td>Tipo</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($charMagic as $singleMagic) {
                ?>
                <tr>
                    <td><input class="usable" type="checkbox" name="magic[]"
                               value="<?= $singleMagic['idt_magia'] ?>">
                    <td><?= $singleMagic['nme_magia'] ?></td>
                    <td><?= $singleMagic['mod_base_magia'] ?></td>
                    <td><?= $singleMagic['tpo_magia'] ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
        
    } else {
        ?>
        <h6><span style="color: darkgray;">--Sem magias--</span></h6>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-xs-5 col-xs-offset-2">
            <select id="new-Magic" name="new-Magic" class="form-control" required="required">
                <option selected="selected" disabled="disabled" hidden="hidden">Selecione uma opção
                </option>
                <?php
                if ($availableMagic) {
                    foreach ($availableMagic as $uniqueMagic) {
                        ?>
                        <option value="<?= $uniqueMagic['idt_magia'] ?>"><?= $uniqueMagic['nme_magia'] ?></option>
                        <?php
                    }
                } else {
                    ?>
                    <option disabled="disabled">Nenhuma magia disponível</option>
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
            if ($charMagic) {
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
