<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18/01/18
 * Time: 11:26
 */
require('../../config.php');
include('../../header.php');


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
            if ($user->createUser($_POST['name'], $_POST['login'], $_POST['email'], $_POST['password'])) {
                $user->login($_POST['login'], $_POST['password']);
                header('Location:../index.php?success=1');
                
            }
            
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('" . $user->createUser($_POST['name'], $_POST['login'], $_POST['email'], $_POST['password']) . "');";
            echo "</script>";
            include 'createUseraux.php';
        }
    
    
} else {
    
    
    include 'createUseraux.php';
    
}
?>
