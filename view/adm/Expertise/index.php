    <?php

    require('../../../config.php');
    include('../../../header.php');


    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {

        ?>
        <head>
            <title>RPG_Unnamed - Perícias</title>
        </head>
        <body id="expertise-home">

    <h1><?= RPG_NAME ?></h1>
    <h2>Perícias</h2>

    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 2) {
            ?>
            <div class="alert alert-danger">Não foi possível editar o item selecionado, tente novamente.</div>
            <?php

        }
    }
    if (isset($_GET['success'])) {
        if ($_GET['success'] == 2) {
            ?>
            <div class="alert alert-success">Perícia alterada com sucesso!</div>
            <?php
        }
    }

    include '../menuADM.php';
    $db = new DataBase();
    $expertises = $db->search("SELECT * FROM td_pericia");
    ?>
    <a href="addExpertise.php" class="btn btn-primary" id="addExpertiseBtn">Adicionar pericia</a><br>
    <div class="col-xs-5">
        <form action="deleteExpertises.php" class="form-horizontal" method="post" id="form"
              onsubmit="return confirm('Deseja realmente deletar as perícias ' +
                 'selecionadas?')">
            <table class="table table-responsive">
                <thead>
                <tr>

                    <?php
                    if ($expertises) {
                        ?>
                        <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                        <?php
                    } else {
                        ?>
                        <td><input disabled="disabled" type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>

                        <?php
                    }
                    ?>
                    <td>Perícia</td>
                    <td>Editar</td>
                </tr>
                </thead>
                <tbody>

                <?php
                if ($expertises) {
                    foreach ($expertises as $expertise) {

                        ?>
                        <tr>
                            <td><input type="checkbox" name="expertises[]" value="<?= $expertise['idt_pericia'] ?>">
                            </td>
                            <td><?= $expertise['nme_pericia'] ?></td>
                            <td>
                                <a href="editExpertise.php?idt=<?= $expertise['idt_pericia'] ?>"><i class="fa fa-pencil"
                                                                                                        aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-info">Não há nenhuma perícia registrada ainda</div>
                    <?php
                }
                ?>

                </tbody>
            </table>
            <?php
            if ($expertises) {
                ?>
                <input type="submit" value="Deletar" class="btn btn-default btn-sm">
                <?php
            } else {
                ?>
                <input disabled="disabled" type="submit" value="Deletar" class="btn btn-default btn-sm">

                <?php
            }
            ?>


        </form>
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

        <?php
    }