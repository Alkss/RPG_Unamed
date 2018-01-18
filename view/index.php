<?php
require('../config.php');
include('../header.php');
?>
<body id="index-page">
<?php


if (isset($_POST['usrName'])) {
    $user = new User();
    $login = $user->login($_POST['usrName'], $_POST['psswrd']);
    if ($login == "adm") {
        header("Location:adm/homepageADM.php");
    } else if ($login == "usr") {
        header("Location:user/homepage.php");
    } else {
        ?>
        <script>
            alert('<?php echo $login?>')
        </script>
        
        <?php
        
    }
}

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/11/17
 * Time: 23:13
 */

if (isset($_GET['sucess'])) {
    ?>
    <div class="alert alert-success">Usuário Registrado com sucesso, aguarde a aprovação de um administrador.</div>
    
    <?php
    
}

?>


<div class="container">
    <h1>RPG Unamed</h1>
    <div class="row">
        <form class="form-group" id="loginForm" method="post">
            <div>
                <div class="col-xs-4">
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
        <div class="col-xs-6">
            <button class="btn btn-primary" id="login" name="loginBtn">Acessar</button>
            </form>
            <a class="btn btn-primary" id="createNewUser" name="newUser">Criar novo usuário</a>
        </div>
    </div>

</div>
</body>