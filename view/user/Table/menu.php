<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/01/18
 * Time: 16:06
 */
$db = new DataBase();
$numberOfCharSQL = "SELECT * FROM tb_personagem JOIN ta_perfil_sala ON idt_personagem=cod_personagem JOIN tb_usuario ON idt_usuario=cod_usuario WHERE idt_usuario =" . $_SESSION['idt_usuario'];
$numberOfCharSQL = $db->search($numberOfCharSQL);
$chars = $db->search("SELECT * FROM ta_perfil_sala JOIN tb_sala ON cod_sala=idt_sala JOIN tb_personagem ON cod_personagem = idt_personagem WHERE cod_sala='" . $db->scapeCont($_GET['idt']) . "'");
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
                    <a href="../Character/index.php?char=<?= $char['idt_personagem'] ?>&idt=<?= $_GET['idt'] ?>"><?= $char['nme_personagem'] ?>    (<?=$char['qtd_vida_personagem']?><i class="fa fa-heart-o" aria-hidden="true"></i>)
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
        <p><a href="http://bunkernerd.com.br/dungeons-dragons-dd-regras-basicas/">Livro de Regras</a></p>
        <hr>
        <p><a>Usuários</a></p>
        <hr>
        <p><a>Customizáveis</a></p>
    </div>
    </body>
</div>
