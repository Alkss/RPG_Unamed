<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18/01/18
 * Time: 11:57
 */

?>
<body id="new-user-adm">
<h1><?= RPG_NAME ?></h1>
<h2>Novo usuário</h2>
<?php

include '../menuADM.php';
?>
<div class="col-xs-5">
        <div id="form-adm">
            <form method="post" id="create-new-user-adm">
                <p>
                    <label for="name">Nome</label><br>
                    <input class="form-control" type="text" name="name" id="name">
                </p>
                <p>
                    <label for="login">Login</label><br>
                    <input class="form-control" type="text" name="login" id="login">
                </p>
                <p>
                    <label for="email">Email</label><br>
                    <input class="form-control" type="text" name="email" id="email">
                </p>
                <p>
                    <label for="userType">Tipo de usuário</label>
                    <select class="form-control" id="userType" name="userType">
                        <option selected disabled="disabled" hidden>Escolha um valor</option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuario Comum</option>
                    </select>
                </p>
                <p>
                <div class="row">
                    <label for="active">Ativo?</label>
                    <input type="checkbox" id="active" name="active">
                </div>
                </p>
                <p>
                    <label for="password">Senha</label><br>
                    <input class="form-control" type="password" name="password" id="password">
                </p>
                <p>
                    <label for="confirm-password">Confirmar senha</label><br>
                    <input class="form-control" type="password" name="confirm-password" id="confirm-password">
                </p>

                <button class="btn btn-primary" id="createUser" name="createUserBtn">Criar Usuario</button>
            </form>
    </div>
</div>
</body>
