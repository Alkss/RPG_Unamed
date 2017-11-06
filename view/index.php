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
        <form class="form-group" id="loginForm">
            <div>
                <div class="col-xs-6">
                    Nome de Usuário:
                    <input type="text" class="form-control">
                </div>
                <div class="col-xs-3">
                    Senha:
                    <input type="password" class="form-control">
                </div>
            </div>
    </div>
    </form>

    <div class="row">
        <div class="col-xs-12">
            <a class="btn btn-primary" href="loginadm.php">Login ADM</a>
            <a class="btn btn-primary" href="loginusr.php">Login Comum</a>
        </div>
    </div>

</div>


