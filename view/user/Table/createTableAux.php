<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07/02/18
 * Time: 18:12
 */
//TODO: Finalizar a criação de mesas, verificar o nome da mesa e realizar a inserção no banco de dados.

?>

<body id="create-new-table">
<h1><?= RPG_NAME ?></h1>
<h2>Nova Mesa</h2>
<div class="container">
    <div id="form">
        <form method="post" id="create-new-table">
            <p>
                <label for="name">Nome da mesa</label><br>
                <input class="form-control" type="text" name="name" id="name">
            </p>
            <p>
                <label for="nPlayers">Quantidade de Jogadores</label><br>
                <input class="form-control" type="number" name="nPlayers" id="nPlayers">
            </p>
            <p>
                <label for="campaign">História da Campanha</label><br>
                <textarea name="campaign" id="campaign" class="form-control" style="height: 180px"></textarea>
            </p>
            <p>

                <label for="password">Senha</label><br>
                <input class="form-control" type="password" name="password" id="password" onmouseover="showPass();"
                       onmouseout="hidePass();">
            </p>


            <button class="btn btn-primary" id="createUser" name="createUserBtn">Criar Mesa</button>
        </form>
    </div>
</div>
</body>
<script>

    function showPass() {
        var password = document.getElementById('password');
        password.removeAttribute("type");
    }
    function hidePass() {
        var password = document.getElementById('password');
        password.setAttribute('type','password')
    }


</script>

