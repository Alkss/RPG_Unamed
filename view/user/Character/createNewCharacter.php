<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/02/18
 * Time: 19:28
 */
require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    
    if (isset($_POST['nme_personagem']) && isset($_POST['exp_personagem']) &&
        isset($_POST['gen_personagem']) && isset($_POST['religiao']) &&
        isset($_POST['pes_personagem']) && isset($_POST['alt_personagem']) &&
        isset($_POST['dsc_cabelo_pesonagem']) && isset($_POST['cor_olho']) &&
        isset($_POST['img_personagem']) && isset($_POST['hst_personagem']) &&
        isset($_POST['inf_adicional_personagem']) && isset($_POST['alignments']) &&
        isset($_POST['classe']) && isset($_POST['racas'])
    ) {
        $character = new Character();
        if ($character->createCharacter_pt1($_POST['nme_personagem'], $_POST['exp_personagem'],
            $_POST['gen_personagem'], $_POST['religiao'],
            $_POST['pes_personagem'], $_POST['alt_personagem'],
            $_POST['dsc_cabelo_pesonagem'], $_POST['cor_olho'],
            $_POST['img_personagem'], $_POST['hst_personagem'],
            $_POST['inf_adicional_personagem'], $_POST['alignments'],
            $_POST['classe'], $_POST['racas'])
        ) {
            header('Location: ../Table/index.php?idt=' . $_GET['idt']);
        } else {
            ?>
            <div class="alert alert-warning">O nome do personagem já existe, por favor selecione outro.</div>
            <?php
            include 'createNewCharacterAux.php';
        }
    } else {
        include 'createNewCharacterAux.php';
        ?>

        <script>
            function checkClass() {
                var classe = $("#classe").val();
                var align = $("#alignments").val();

                if (classe !== "") {
                    $("#alignments").removeAttr("disabled");
                }
                $.post("<?=URL?>/view/user/Character/charAjax.php", {
                    classe: classe,
                    align: align,
                    action: "checkClass"
                }).done(
                    function (returnedData) {
                        $("#alignments").html(returnedData);
                    }
                )
            }
        </script>
        <?php
    }
}
?>

