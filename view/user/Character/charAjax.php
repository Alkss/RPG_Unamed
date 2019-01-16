<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18/06/18
 * Time: 12:44
 */

require('../../../config.php');
$classe = new Classe();
$race = new Race();
$alinhamento = new Alignment();
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
        break;
    case "checkRace":
        $avaibleRaces = $race->avaibleSizes($_POST['race']);
        ?>
        <input class="form-control" type="number" min="<?= $avaibleRaces[1] ?>" max="<?= $avaibleRaces[2] ?>" step="0.01"
               name="alt_personagem"
               id="alt_personagem"
               required="required">
        <?php
        break;
    case "checkRaceSize":
        $avaibleRaces = $race->avaibleSizes($_POST['race']);
        ?>
        <input class="form-control" type="number" min="<?= $avaibleRaces[3] ?>" max="<?= $avaibleRaces[4] ?>" step="0.01"
               name="pes_personagem"
               id="pes_personagem"
               required="required">
        <?php
        break;
    
    case "checkAlign":
        $avaibleDiv = $alinhamento->avaibleAlignments($_POST['align']);
        ?>
        <option value="" selected hidden>-- Selecione uma opção --</option>
        <?php
        foreach ($avaibleDiv as $key => $singleDiv) {
            ?>
            <option value="<?= $key ?>"><?= $singleDiv ?></option>
            <?php
        }
        break;
    
}
