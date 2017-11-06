<?php
require('../config.php');
new LoginController($_POST['loginBtn']);

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 06/11/17
 * Time: 00:30
 */
class LoginController
{

    function __construct($choice)
    {
        $this->redirect($choice);
    }


    public function redirect($choice)
    {
        if ($choice == "ADM") {
            header('Location:../view/loginadm.php?name=' . $_POST['usrName'] . '&password=' . $_POST['psswrd']);
        } else if ($choice == "USER") {
            header('Location:../view/loginusr.php?name=' . $_POST['usrName'] . '&password=' . $_POST['psswrd']);
        }

    }

}