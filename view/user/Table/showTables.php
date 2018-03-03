<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08/02/18
 * Time: 20:00

require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
}
 */
if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
}
$db = new DataBase();
$idt_usuario = $_SESSION["idt_usuario"];
$sala = $db->search("SELECT idt_sala, nme_sala FROM tb_sala INNER JOIN ta_perfil_sala ON cod_sala = idt_sala 
                    WHERE cod_usuario=" . $db->scapeCont($idt_usuario));
?>

<div class="col-xs-5">
        <table class="table table-responsive">
            <thead>
            <tr>
                <td>Sala</td>
                <td>Go</td>
            </tr>
            </thead>
            <tbody>
            
            <?php
            if ($sala) {
                foreach ($sala as $sala) {
                    
                    ?>
                    <tr>
                        <td><?= $sala['nme_sala'] ?></td>
                        <td>
                            <a href="index.php?idt=<?= $sala['idt_sala'] ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-info">Não há nenhuma sala registrado ainda</div>
                <?php
            }
            ?>

            </tbody>
        </table>



