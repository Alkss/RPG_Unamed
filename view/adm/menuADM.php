<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/01/18
 * Time: 16:06
 */
?>
<body id="menu-ADM">
    <div class="col-xs-4">
        <p class="menuTitle">Menu</p>
        <p><a href="<?= URL ?>view/adm/homepageADM.php">Início</a></p>
        <p><a href="<?= URL ?>view/adm/User/index.php">Usuários</a></p>
        <p><a>Salas</a></p> <?//TODO:Acrescentar as salas depois de finalizar a criação de salas na parte do jogador?>
        <p><a href="<?= URL ?>view/adm/Classes/index.php">Classes</a></p>
        <p><a href="<?= URL ?>view/adm/Language/index.php">Linguagens</a></p>
        <p><a href="<?= URL ?>view/adm/Race/index.php">Raças</a></p>
        <p><a href="<?= URL ?>view/adm/Alignment/index.php">Alinhamentos</a></p>
        <p id="exit_btn"><a href="<?= URL ?>view/adm/exit.php">Sair</a></p>
    </div>
</body>