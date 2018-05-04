<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04/05/18
 * Time: 14:10
 */
?>
<div id="editUserModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Usuários da Sala</h4>
            </div>
            <div class="modal-body">
                <?php
                if ($userChar) {
                    ?>
                    <form action="../index.php?idt=<?= $_GET['idt'] ?>" method="post">
                        <table id="editUserTable">
                            <tbody>
                            <tr>
                                <th>Personagem</th>
                                <th>Dono</th>
                                <th>Papel</th>
                            </tr>
                            <?php
                            foreach ($userChar as $singleUserChar) {
                                ?>
                                <tr>
                                    <td><?= $singleUserChar['nme_personagem'] ?></td>
                                    <td><?= $singleUserChar['nme_usuario'] ?></td>
                                    <td>
                                        <select name="userRole" id="userRole" class="form-control">
                                            <?php
                                            //todo: mostrar como opção padrão(do papel do usuario) o valor atual do usuário e mostrar as demais opções.
                                            ?>
                                            <option>NYI</option>
                                        </select>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </form>
                    <?php
                } else {
                    ?>
                    <h6>Não existem jogadores</h6>
                    <?php
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>
