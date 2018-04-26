<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/04/18
 * Time: 13:47
 */
?>
<div class="col-xs-10">
    <div class="row">
        <div class="col-xs-3 col-xs-offset-1">
            <?php
            $imgURL = $selectedChar[0]['img_personagem'];
            echo '<img id="charImg" src="' . $imgURL . '">';
            ?>
        </div>
        <div class="col-xs-3">
            <label for="editName">Editar nome</label>
            <input type="text" value="<?=$selectedChar[0]['nme_personagem']?>" id="editName" name="editName" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-xs-offset-1">
            <label for="editImg">Editar imagem (URL)</label>
            <input type="text" name="editImg" value="<?=$imgURL?>" id="editImg" class="form-control">
        </div>
    </div>
</div>