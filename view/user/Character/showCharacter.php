<?php
if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
}
$db = new DataBase();
$character = new Character();
$idt_usuario = $_SESSION["idt_usuario"];
$personagens = $character->selectCharacter();
?>

<div class="col-xs-5">
    <h3 style="text-align: center;">Personagens utilizados recentemente</h3>
            <?php
            if ($personagens) {
                foreach ($personagens as $personagens) {
                    ?>
                    <div class="gallery">
                            <img src="<?= $personagens['img_personagem'] ?>" width="300" height="600">
                        <div class="desc"><?= $personagens['nme_personagem'] ?></div>
                    </div>

                    <?php
                }
            } else {
                ?>
                <div class="alert alert-info">Não há nenhum personagem registrado ainda</div>
                <?php
            }
            ?>

