<?php
require('../../config.php');
include('../../header.php');
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/01/18
 * Time: 15:01
 */

if (!($_SESSION['logado'] == 1 && $_SESSION['permissoes'] == "adm")) {
    header('location:'. URL .'/view/index.php');
}
if (isset($_POST['activeUser'])) {
    $db = new DataBase();

    foreach ($_POST['activeUser'] as $user) {
        if ($db->executeQuery("update tb_usuario set atv_usuario=1 where idt_usuario=" . $user . ";")) {
            echo "<script type='text/javascript'>";
            echo "alert('Usuarios ativados com sucesso!');";
            echo 'window.location="homepageADM.php"';
            echo "</script>";
        }
    }


}
