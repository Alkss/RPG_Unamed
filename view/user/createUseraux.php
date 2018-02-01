<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18/01/18
 * Time: 11:57
 */

?>
<body id="create-new-user">
<h1><?= RPG_NAME ?></h1>
<h2>Novo usuário</h2>
<div class="container">
    <div id="form">
        <form method="post" id="create-new-user">
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
