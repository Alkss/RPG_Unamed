<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04/05/18
 * Time: 09:53
 */
$table = new Table();
$charsAtTable = $table->selectCharacterTable($_GET['idt']);
?>
<div class="row" id="show-character-at-table">
    <div class="col-xs-10" style="display:flex">
        <?php
        if (!$charsAtTable) {
            foreach ($charsAtTable as $singleChar) {
                ?>
                <div class="col-xs-4" id="charDiv">
                    <div class="row">
                        <img src="<?= $singleChar['img_personagem'] ?>">
                    </div>
                    <div class="row">
                        <h6><?= $singleChar['nme_personagem'] ?> (<span
                                    style="color:white"><?= $singleChar['nme_usuario'] ?></span>)</h6>
                    </div>
                    <div class="row">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                 aria-valuenow="<?= $singleChar['qtd_vida_personagem'] ?>" aria-valuemin="0"
                                 aria-valuemax="<?= $singleChar['qtd_vida_total_personagem'] ?>"
                                 style="width: <?php
                                 $percent = round((100 * $singleChar['qtd_vida_personagem']) / $singleChar['qtd_vida_total_personagem'], 2);
                                 echo $percent
                                 ?>%">
                            </div>
                        </div>
                        <h6>(<?= $singleChar['qtd_vida_personagem'] ?>)</h6>

                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <h6 style="margin:0 auto;">Esta sala não possui personagens</h6>
            <?php
        }
        ?>
    </div>

</div>