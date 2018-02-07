<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18/01/18
 * Time: 11:26
 */
require('../../../config.php');
include('../../../header.php');


if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password']) && isset($_POST['userType'])) {
    if (isset($_POST['active'])) {
        $active = 1;
    } else {
        $active = 0;
    }
    
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
            
            
            if ($user->createUserADM($_POST['name'], $_POST['login'], $_POST['email'], $_POST['password'], $_POST['userType'], $active)) {
                $user->login($_POST['login'], $_POST['password']);

                header('Location:index.php?success=1');
            
            }
            
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('" . $user->createUserADM($_POST['name'], $_POST['login'], $_POST['email'], $_POST['password'], $_POST['userType'], $active) . "');";
            echo "</script>";
            include 'createUseraux.php';
        }
    
    
} else {
    
    
    include 'createUseraux.php';
    
}
?>
