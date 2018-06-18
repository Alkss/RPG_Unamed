<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04/05/18
 * Time: 14:10
 */

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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
                    <form action="/RPG_Unamed/view/user/Table/users/updateUserRole.php?idt=<?= $_GET['idt'] ?>"
                          method="post" id="userListForm">
                        <table id="editUserTable">
                            <tbody>
                            <tr>
                                <th>Personagem</th>
                                <th>Usuário</th>
                                <th>Papel</th>
                            </tr>
                            <?php
                            foreach ($userChar as $singleUserChar) {
                                ?>
                                <tr>
                                    <td><?php
                                        if ($singleUserChar['nme_personagem']) {
                                            echo $singleUserChar['nme_personagem'];
                                        } else {
                                            echo "Não tem personagem";
                                        }
                                        
                                        ?></td>
                                    <td><?= $singleUserChar['nme_usuario'] ?></td>
                                    <td>
                                        <select name="userRole[<?= $singleUserChar['cod_usuario'] ?>]" id="userRole"
                                                class="form-control">


                                            <option selected="selected"
                                                    value="<?= $singleUserChar['cod_papel_sala'] ?>"
                                                    hidden="hidden"><?= $singleUserChar['nme_papel_sala'] ?></option>
                                            <?php
                                            $roles = array("1" => "Jogador", "2" => "Mestre", "3" => "Dono");
                                            foreach ($roles as $key => $role) {
                                                ?>
                                                <option value="<?= $key ?>"><?= $role ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <input type="hidden" value="<?= $actual_link ?>" name="previusPage" id="previusPage">
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="updateUserRole" name="updateUserRole">Atualizar</button>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <h6>Não existem jogadores</h6>
                    <?php
                }
                ?>
            </div>

        </div>

    </div>
</div>