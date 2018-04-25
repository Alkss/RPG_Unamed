<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/01/18
 * Time: 16:06
 */


?>
<body id="menu-ADM">
<div class="col-xs-4" id="menu-adm">
    <p class="menuTitle">Menu</p>
    <p><a href="<?= URL ?>view/user/Table/index.php?idt=<?=$_GET['idt']?>" id="homeBtn">Início</a></p>
    <hr>
    <p>Personagens</p>
    
    <?php
    if ($chars) {
        foreach ($chars as $char) {
            ?>
            <p><a href="../Character/index.php?idt=<?= $char['idt_personagem'] ?>"><?= $char['nme_personagem'] ?></a></p>
            <?php
        }
    }
    ?>

    <!--Permissão somente para o mestre criar personagem-->
    <?php
    
    if (!$numberOfCharSQL) {
        ?>
        <p><a href="<?= URL ?>view/user/Character/createNewCharacter.php?idt=<?= $_GET['idt'] ?>">Criar personagem</a>
        </p>
        <?php
    }
    ?>
    <hr>
    <p><a>Livro de Regras</a></p>
    <hr>
    <p><a>Usuários</a></p>
    <hr>
    <p><a>Customizáveis</a></p>
    <p id="exit_btn"><a href="<?= URL ?>view/adm/exit.php">Sair</a></p>
</div>
</body>