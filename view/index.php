<?php
require('../config.php');
include('../header.php');


/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/11/17
 * Time: 23:13
 */
?>


<div class="container">
    <h1>RPG Unamed</h1>
    <div class="row">
        <form class="form-group" id="loginForm" method="post" action="../Control/LoginController.php">
            <div>
                <div class="col-xs-6">
                    Nome de Usuário:
                    <input type="text" class="form-control" name="usrName" id="usrName">
                </div>
                <div class="col-xs-3">
                    Senha:
                    <input type="password" class="form-control" name="psswrd" id="usrName">
                </div>
            </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-primary" id="loginAdm" name="loginBtn" value="ADM">Login ADM</button>
            <button class="btn btn-primary" id="loginUsr" name="loginBtn" value="USER">Login Comum</button>
        </div>
    </div>
    </form>

</div>
