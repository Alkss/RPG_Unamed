<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/05/18
 * Time: 13:26
 */
?>
<form method="post" action="Character/../helper/customManager.php?idt=<?= $_GET['idt'] ?>&char=<?= $_GET['char'] ?>">
    <div class="row">
        <div class="col-xs-6">
            <label for="new-custom-name">Nome do Pertence</label>
            <input required="required" type="text" class="form-control" name="new-custom-name" id="new-custom-name"
                   placeholder="Digite o nome do pertence">
        </div>
        <div class="col-xs-6">
            <label for="new-custom-type">Tipo de Pertence</label>
            <select required="required" class="form-control" name="new-custom-type" id="new-custom-type">
                <option disabled="disabled" hidden="hidden" selected="selected">Selecione uma opção</option>
                <option value="E">Equipamento</option>
                <option value="M">Magia</option>
                <option value="I">Item</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <label for="new-custom-desc">Descrição do Pertence</label>
            <textarea required="required" name="new-custom-desc" id="new-custom-desc" class="form-control"
                      placeholder="Digite a descrição do pertence" style="height: 100px"></textarea>
        </div>
        <div class="col-xs-6">
            <br>
            <input type="submit" value="Criar um personalizado" name="add-Custom" id="add-Custom"
                   class="btn btn-primary">
        </div>
    </div>
</form>
