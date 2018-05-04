<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/01/18
 * Time: 16:06
 */
$db = new DataBase();
$numberOfCharSQL = "SELECT * FROM tb_personagem JOIN ta_perfil_sala ON idt_personagem=cod_personagem JOIN tb_usuario ON idt_usuario=cod_usuario WHERE idt_usuario= " . $_SESSION['idt_usuario'] . " AND cod_sala=" . $_GET['idt'];
$numberOfCharSQL = $db->search($numberOfCharSQL);
$chars = $db->search("SELECT * FROM ta_perfil_sala JOIN tb_sala ON cod_sala=idt_sala JOIN tb_personagem ON cod_personagem = idt_personagem WHERE cod_sala='" . $db->scapeCont($_GET['idt']) . "'");

$userChar = $db->search("SELECT nme_usuario, nme_personagem, nme_papel_sala FROM tb_usuario JOIN ta_perfil_sala ON idt_usuario=cod_usuario JOIN td_papel_sala ON idt_papel_sala=cod_papel_sala JOIN tb_sala ON idt_sala=cod_sala JOIN tb_personagem ON idt_personagem=cod_personagem WHERE idt_sala=" . $_GET['idt']);

$table = new Table();

?>
<div class="col-xs-2">

    <body id="menu-table">
    <div class="col-xs-4" id="menu-table">
        <p class="menuTitle">Menu</p>
        <p><a href="<?= URL ?>view/user/Table/index.php?idt=<?= $_GET['idt'] ?>" id="homeBtn">Início</a></p>
        <hr>
        <p>Personagens</p>
        
        <?php
        if ($chars) {
            foreach ($chars as $char) {
                ?>
                <p>
                    <a href="../Character/index.php?char=<?= $char['idt_personagem'] ?>&idt=<?= $_GET['idt'] ?>"><?= $char['nme_personagem'] ?>
                        (<?= $char['qtd_vida_personagem'] ?><i class="fa fa-heart-o" aria-hidden="true"></i>)
                    </a>
                </p>
                <?php
            }
        }
        ?>

        <!--Permissão somente para o mestre criar personagem-->
        <?php
        
        if (!$numberOfCharSQL) {
            ?>
            <p><a href="<?= URL ?>view/user/Character/createNewCharacter.php?idt=<?= $_GET['idt'] ?>">Criar
                    personagem</a>
            </p>
            <?php
        }
        ?>
        <hr>
        <p><a href="http://bunkernerd.com.br/dungeons-dragons-dd-regras-basicas/" target="_blank">Livro de Regras</a>
        </p>
        
        <?php
        $tableInfo = $table->selectUserRole($_GET['idt'], $_SESSION['idt_usuario']);
        if ($tableInfo[0]['cod_papel_sala'] != 1) {
            ?>
            <!--Permissão para somente o mestre criar customizaveis e ver permissões dos jogadores-->
            <hr>
            <p><a id="modal-custom" data-toggle="modal" data-target="#editUserModal">Usuários</a></p>
            <hr>
            <p><a id="modal-custom" data-toggle="modal" data-target="#customModal">Customizáveis</a></p>
            <?php
        }
        ?>
    </div>

    <div id="customModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Criar personalizado</h4>
                </div>
                <div class="modal-body">
                    <form method="post"
                          action="/RPG_Unamed/view/user/Character/helper/customManager.php?idt=<?= $_GET['idt'] ?>">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="new-custom-name">Nome do Pertence</label>
                                <input required="required" type="text" class="form-control" name="new-custom-name"
                                       id="new-custom-name"
                                       placeholder="Digite o nome do pertence">
                            </div>
                            <div class="col-xs-6">
                                <label for="new-custom-type">Tipo de Pertence</label>
                                <select required="required" class="form-control" name="new-custom-type"
                                        id="new-custom-type">
                                    <option disabled="disabled" hidden="hidden" selected="selected">Selecione uma
                                        opção
                                    </option>
                                    <option value="E">Equipamento</option>
                                    <option value="M">Magia</option>
                                    <option value="I">Item</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="new-custom-desc">Descrição do Pertence</label>
                                <textarea required="required" name="new-custom-desc" id="new-custom-desc"
                                          class="form-control"
                                          placeholder="Digite a descrição do pertence" style="height: 100px"></textarea>
                            </div>
                            <div class="col-xs-6">
                                <br>
                                <input type="submit" value="Criar um personalizado" name="add-Custom"
                                       id="add-Custom"
                                       class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                </div>
            </div>

        </div>
    </div>
    <?php
    include 'users/index.php';
    ?>
    </body>
</div>
