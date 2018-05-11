<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11/05/18
 * Time: 19:35
 */
?>

<!--Modal de Classe-->
<div id="classModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Lista de Classes</h4>
            </div>
            <div class="modal-body">
                <table>
                    <tbody>
                    <tr>
                        <th>Classe</th>
                        <th>Descrição</th>
                    </tr>
                    <?php
                    foreach ($classe as $singleClass) {
                        ?>
                        <tr>
                            <td><strong><?= $singleClass['nme_classe'] ?></strong></td>
                            <td><?= $singleClass['dsc_classe'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>
<!--Modal de Raça-->
<div id="raceModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Lista de Raças</h4>
            </div>
            <div class="modal-body">
                <table>
                    <tbody>
                    <tr>
                        <th>Raça</th>
                        <th>Descrição</th>
                    </tr>
                    <?php
                    foreach ($race as $singleRace) {
                        ?>
                        <tr>
                            <td><strong><?= $singleRace['nme_raca'] ?></strong></td>
                            <td><?= $singleRace['dsc_raca'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>
<!--Modal de Religião-->
<div id="relModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Lista de Divindades</h4>
            </div>
            <div class="modal-body">
                <table>
                    <tbody>
                    <tr>
                        <th>Divindade</th>
                        <th>Descrição</th>
                    </tr>
                    <?php
                    foreach ($religiao as $singleRel) {
                        ?>
                        <tr>
                            <td><strong><?= $singleRel['nme_divindade'] ?></strong></td>
                            <td><?= $singleRel['dsc_divindade'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>
