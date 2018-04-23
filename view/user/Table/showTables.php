<?php
require('../../../config.php');
include('../../../header.php');

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08/02/18
 * Time: 20:00
 *
 * require('../../../config.php');
 * include('../../../header.php');
 *
 *
 * if ($_SESSION['logado'] != 1) {
 * header('location:' . URL . '/view/index.php');
 * }
 */
if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
}
$db = new DataBase();
$idt_usuario = $_SESSION["idt_usuario"];
$salas = $db->search("SELECT idt_sala, nme_sala FROM tb_sala INNER JOIN ta_perfil_sala ON cod_sala = idt_sala
                    WHERE cod_usuario=" . $db->scapeCont($idt_usuario));
?>
<body id="showTables">
<div class="col-xs-12" id="tableList">

    <table class="table table-responsive">
        <thead>
        <tr>
            <?php
            if ($salas) {
                ?>
                <th>Mesas</th>
                <?php
            }
            ?>
        </tr>
        </thead>
        <tbody>
        
        <?php
        if ($salas) {
            foreach ($salas as $sala) {
                
                ?>
                <tr>
                    <td><a href="index.php?idt=<?= $sala['idt_sala'] ?>" target="_blank"><?= $sala['nme_sala'] ?></a>
                    </td>
                </tr>
                
                <?php
            }
        } else {
            ?>
            <div class="alert alert-info" id="emptyAlert">Não há nenhuma sala registrado ainda</div>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>
</body>

