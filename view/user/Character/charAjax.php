<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18/06/18
 * Time: 12:44
 */

require('../../../config.php');
$classe = new Classe();

switch ($_POST['action']) {
    case "checkClass":
        $avaibleAlignments = $classe->avaibleAlignments($_POST['classe']);
        ?>
        <option value="" selected hidden>-- Selecione uma opção --</option>
        <?php
        foreach ($avaibleAlignments as $key => $alignment) {
            ?>
            <option value="<?= $key ?>"><?= $alignment ?></option>
            <?php
        }
    
}