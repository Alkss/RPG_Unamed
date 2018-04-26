<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/04/18
 * Time: 13:47
 */
?>
<div class="col-xs-10">
    <form method="post">
        <div class="row">
            <div class="col-xs-3 col-xs-offset-1">
                <?php
                $imgURL = $selectedChar[0]['img_personagem'];
                echo '<img id="charImg" src="' . $imgURL . '">';
                ?>
            </div>

            <input type="hidden" name="idt" id="idt" value="<?= $selectedChar[0]['idt_personagem']?>">
            
            <div class="col-xs-3">
                <label for="editName">Nome</label>
                <input required="required" type="text" value="<?= $selectedChar[0]['nme_personagem'] ?>" id="editName" name="editName"
                       class="form-control">

                <label for="editRace">Raça</label>
                <select required="required" class="form-control" id="editRace" name="editRace">
                    <?php
                    foreach ($selectedRace as $singleRace) {
                        if ($singleRace['idt_raca'] == $selectedChar[0]['cod_raca']) {
                            ?>
                            <option value="<?= $singleRace['idt_raca'] ?>"
                                    selected="selected"><?= $singleRace['nme_raca'] ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?= $singleRace['idt_raca'] ?>"><?= $singleRace['nme_raca'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>

                <label for="editAlignment">Alinhamento</label>
                <select required="required" class="form-control" id="editAlignment" name="editAlignment">
                    <?php
                    foreach ($selectedAlignment as $singleAlignment) {
                        if ($singleAlignment['idt_alinhamento'] == $selectedChar[0]['cod_alinhamento']) {
                            ?>
                            <option value="<?= $singleAlignment['idt_alinhamento'] ?>"
                                    selected="selected"><?= $singleAlignment['nme_alinhamento'] ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?= $singleAlignment['idt_alinhamento'] ?>"><?= $singleAlignment['nme_alinhamento'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-xs-2">
                <label for="editClass">Classe</label>
                <select required="required" class="form-control" id="editClass" name="editClass">
                    <?php
                    foreach ($selectedClass as $singleClass) {
                        if ($singleClass['idt_classe'] == $selectedClass[0]['cod_classe']) {
                            ?>
                            <option value="<?= $singleClass['idt_classe'] ?>"
                                    selected="selected"><?= $singleClass['nme_classe'] ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?= $singleClass['idt_classe'] ?>"><?= $singleClass['nme_classe'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>

                <label for="editGenre">Genêro</label>
                <select required="required" id="editGenre" name="editGenre" class="form-control">
                    <?php
                    $genres = array('M' => 'Masculino', 'F' => 'Feminino');
                    foreach ($genres as $key => $genre) {
                        if ($selectedChar[0]['gen_personagem'] == $key) {
                            ?>
                            <option selected="selected" value="<?= $key ?>"><?= $genre ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?= $key ?>"><?= $genre ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>

                <label for="eyeColor">Cor dos olhos</label>
                <input required="required" type="text" class="form-control" id="eyeColor" name="eyeColor"
                       value="<?= $selectedChar[0]['cor_olho_personagem'] ?>">
            </div>
            <div class="col-xs-3">
                <label for="height">Altura</label>
                <input required="required" class="form-control" id="height" name="height" type="number" min="0" max="20" step="0.01"
                       value="<?= $selectedChar[0]['alt_personagem'] ?>">

                <label for="weight">Peso</label>
                <input required="required" class="form-control" id="weight" name="weight" type="number"
                       value="<?= $selectedChar[0]['pes_personagem'] ?>">

                <br>
                <button class="btn btn-primary" id="updateChar" name="updateChar">Atualizar informações</button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3 col-xs-offset-1">
                <label for="editImg">Link da imagem (URL)</label>
                <input type="text" name="editImg" value="<?= $imgURL ?>" id="editImg" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h6>História</h6>
                <textarea id="editHist" name="editHist" style="margin-bottom:15px;text-align: justify; height: 180px"
                          class="form-control"><?= $selectedChar[0]['hst_personagem'] ?></textarea>
            </div>
        </div>
    </form>
</div>