<?php
require('../../../config.php');
include('../../../header.php');

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/01/18
 * Time: 13:57
 */


if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
    header('location:' . URL . '/view/index.php');
} else {
    ?>
    <head>
        <title><?= RPG_NAME ?> - Usuários</title>
    </head>
    <body id="user-page-adm">

    <h1><?= RPG_NAME ?></h1>
    <h2>Usuarios</h2>
    <?php
    if (isset($_GET['success']) && ($_GET['success'] == 1)) {
        ?>
        <div class="alert alert-success">Usuário alterado com sucesso</div>
        <?php
    }
    
    include '../menuADM.php';
    $db = new DataBase();
    $allUsers = $db->search("select idt_usuario, nme_usuario, lgn_usuario, nme_tipo_perfil, atv_usuario from tb_usuario join td_tipo_perfil on cod_perfil=idt_tipo_perfil");
    ?>
    <div class="col-xs-5">
        <form action="deleteUsers.php" class="form-horizontal" method="post" id="form"
              onsubmit="return confirm('Deseja realmente fazer a exclusão dos usuários ' +
             'selecionados?')">
            <?php
            if ($allUsers) {
                ?>
                <input type="submit" value="Deletar" class="btn btn-default btn-sm">
                <?php
            } else {
                ?>
                <input disabled="disabled" type="submit" value="Deletar" class="btn btn-default btn-sm">
                
                <?php
            }
            
            ?>
            <div class="content">
                <table class="table table-responsive">
                    <thead class="inactiveUsers">
                    <tr>
                        <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                        <td>Usuário</td>
                        <td>Login</td>
                        <td>Status</td>
                        <td>Perfil</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($allUsers) {
                        foreach ($allUsers as $user) {
                            ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="deleteUser[]" value="<?= $user['idt_usuario'] ?>">
                                </td>
                                <td>
                                    <?= $user['nme_usuario'] ?>
                                </td>
                                <td><?= $user['lgn_usuario'] ?></td>
                                <td><?= $user['nme_tipo_perfil'] ?></td>
                                <td><?php if ($user['atv_usuario'] == 1) {
                                        ?>
                                        Ativo
                                        <?php
                                    } else {
                                        ?>
                                        Inativo
                                        <?php
                                    }
                                    ?></td>
                                <td><a href="editUser.php?idt=<?= $user['idt_usuario'] ?>"><i class="fa fa-pencil"
                                                                                              aria-hidden="true"></i>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-info">Não há nenhum usuário inativo para ser aprovado!</div>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>

        </form>
        <a class="btn btn-primary" href="createNewUser.php">Criar novo usuario</a>
    </div>
    </div>

    <script>

        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    console.log(i)
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }


    </script>
    </body>
    <?php
}