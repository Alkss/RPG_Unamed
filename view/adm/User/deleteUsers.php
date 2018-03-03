<?php
require('../../../config.php');
include('../../../header.php');
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/01/18
 * Time: 15:01
 */

if (!($_SESSION['logado'] == 1 && $_SESSION['permissoes'] == "adm")) {
    header('location:'. URL .'/view/index.php');
}
if (isset($_POST['deleteUser'])) {
    $db = new DataBase();

    foreach ($_POST['deleteUser'] as $user) {
        if ($db->executeQuery("DELETE FROM tb_usuario WHERE idt_usuario=" . $user . ";")) {
            echo "<script type='text/javascript'>";
            echo "alert('Usuarios deletados com sucesso!');";
            echo 'window.location="index.php"';
            echo "</script>";
        }
    }


}
