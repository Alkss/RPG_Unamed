<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18/01/18
 * Time: 11:26
 */
require('../../config.php');
include('../../header.php');

if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
    header('location:' . URL . '/view/index.php');
} else {
    if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
        $user = new User();
        $error = false;
        $message = "";
        if ($user->checkIfExistsByLogin($_POST['login'])) {
            $message = "Nome de usuário já existe";
            $error = true;
        }
        if ($user->checkIfExistsByEmail($_POST['email'])) {
            $message = "Email já existe";
            $error = true;
        }
        if ($error) {
            echo "<script type='text/javascript'>";
            echo "alert('" . $message . "');";
            echo "</script>";
            include 'createUseraux.php';
        } else
            if ($_POST['password'] == $_POST['confirm-password']) {
                $md5password = md5($_POST['password']);
                if ($user->createUser($_POST['name'], $_POST['login'], $_POST['email'], $md5password)) {
                    $user->login($_POST['login'], $md5password);
                    header('Location:../index.php?sucess=1');
                    
                }
                
            } else {
                echo "<script type='text/javascript'>";
                echo "alert('" . $user->createUser($_POST['name'], $_POST['login'], $_POST['email'], md5($_POST['password'])) . "');";
                echo "</script>";
                include 'createUseraux.php';
            }
        
        
    } else {
        
        
        include 'createUseraux.php';
    }
}
?>
