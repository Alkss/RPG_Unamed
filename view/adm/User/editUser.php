<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 06/02/18
 * Time: 19:34
 */
require('../../../config.php');
include('../../../header.php');
$idt = $_GET['idt'];

if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['userType']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
    $user = new User();
    
    if ($_POST['password'] == $_POST['confirm-password']) {
        $md5_password = MD5($_POST['password']);
        echo $user->updateUser($idt, $_POST['name'], $_POST['email'], $_POST['login'], $md5_password, $_POST['userType'], $_POST['active']);
        header('Location:index.php?success=1');
    }
} else if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['userType'])) {
    echo $user->updateUser($idt, $_POST['name'], $_POST['email'], $_POST['login'], $_POST['password'], $_POST['userType'], $_POST['active']);
    header('Location:index.php?success=1');
} else {
    ?>
    <body id="create-new-user-adm">
    <h1><?= RPG_NAME ?></h1>
    <h2>Novo usuário</h2>
    <?php
    $db = new DataBase();
    $user = $db->search("SELECT * FROM tb_usuario join td_tipo_perfil on cod_perfil=idt_tipo_perfil WHERE idt_usuario=" . $_GET['idt']);
    include '../menuADM.php';
    ?>
    <div class="col-xs-5">
        <div id="form-adm">
            <form method="post" id="create-new-user-adm">
                <p>
                    <label for="name">Nome</label><br>
                    <input class="form-control" type="text" name="name" id="name"
                           value="<?= $user[0]['nme_usuario'] ?>">
                </p>
                <p>
                    <label for="login">Login</label><br>
                    <input class="form-control" type="text" name="login" id="login"
                           value="<?= $user[0]['lgn_usuario'] ?>">
                </p>
                <p>
                    <label for="email">Email</label><br>
                    <input class="form-control" type="text" name="email" id="email"
                           value="<?= $user[0]['eml_usuario'] ?>">
                </p>
                <p>
                    <label for="userType">Tipo de usuário</label>
                    <select class="form-control" id="userType" name="userType">
                        <?php
                        $typePerfil = array(1 => 'Administrador', 2 => 'Usuário');
                        foreach ($typePerfil as $key => $perfil) {
                            if ($user[0]['cod_perfil'] == $key) {
                                ?>
                                <option selected="selected"
                                        value="<?= $key ?>"><?= $perfil ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?= $key ?>"><?= $perfil ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <label for="password">Senha</label><br>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Deixe em branco para não alterar">
                </p>
                <p>
                    <label for="confirm-password">Confirmar senha</label><br>
                    <input class="form-control" type="password" name="confirm-password" id="confirm-password" placeholder="Deixe em branco para não alterar">
                </p>

                <input type="hidden" name="active" id="active" value="<?= $user[0]['atv_usuario'] ?>">

                <button class="btn btn-primary" id="createUser" name="createUserBtn">Editar</button>
            </form>
        </div>
    </div>
    </body>
    <?php
}