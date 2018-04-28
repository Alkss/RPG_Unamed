    <?php

    require('../../../config.php');
    include('../../../header.php');


    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {

        ?>
        <head>
            <title>RPG_Unnamed - Magias</title>
        </head>
        <body id="magic-home">

    <h1><?= RPG_NAME ?></h1>
    <h2>Magias</h2>

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
            <div class="alert alert-success">Magia alterado com sucesso!</div>
            <?php
        }
    }

    include '../menuADM.php';
    $db = new DataBase();
    $magics = $db->search("SELECT * FROM td_magia");
    ?>
    <a href="addMagic.php" class="btn btn-primary" id="addMagicBtn">Adicionar magia</a><br>
    <div class="col-xs-5">
        <form action="deleteMagic.php" class="form-horizontal" method="post" id="form"
              onsubmit="return confirm('Deseja realmente deletar os magias ' +
                 'selecionados?')">
            <table class="table table-responsive">
                <thead>
                <tr>

                    <?php
                    if ($magics) {
                        ?>
                        <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                        <?php
                    } else {
                        ?>
                        <td><input disabled="disabled" type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>

                        <?php
                    }
                    ?>
                    <td>Magia</td>
                    <td>Tipo</td>
                    <td>Modificador base</td>
                </tr>
                </thead>
                <tbody>

                <?php
                if ($magics) {
                    foreach ($magics as $magic) {

                        ?>
                        <tr>
                            <td><input type="checkbox" name="magics[]" value="<?= $magic['idt_magia'] ?>">
                            </td>
                            <td><?= $magic['nme_magia'] ?></td>
                            <td><?= $magic['tpo_magia'] ?></td>
                            <td><?= $magic['mod_base_magia'] ?></td>
                            <td>
                                <a href="editMagic.php?idt=<?= $magic['idt_magia'] ?>"><i class="fa fa-pencil"
                                                                                                        aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-info">Não há nenhuma magia registrada ainda</div>
                    <?php
                }
                ?>

                </tbody>
            </table>
            <?php
            if ($magics) {
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