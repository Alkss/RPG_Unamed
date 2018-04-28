    <?php

    require('../../../config.php');
    include('../../../header.php');


    if ($_SESSION['logado'] != 1 && $_SESSION['permissoes'] != "adm") {
        header('location:' . URL . '/view/index.php');
    } else {

        ?>
        <head>
            <title>RPG_Unnamed - Equipamentos</title>
        </head>
        <body id="equipment-home">

    <h1><?= RPG_NAME ?></h1>
    <h2>Equipamentos</h2>

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
            <div class="alert alert-success">Equipamento alterado com sucesso!</div>
            <?php
        }
    }

    include '../menuADM.php';
    $db = new DataBase();
    $equipments = $db->search("SELECT * FROM td_equipamento");
    ?>
    <a href="addEquipment.php" class="btn btn-primary" id="addEquipmentBtn">Adicionar equipamento</a><br>
    <div class="col-xs-5">
        <form action="deleteEquipment.php" class="form-horizontal" method="post" id="form"
              onsubmit="return confirm('Deseja realmente deletar os equipamentos ' +
                 'selecionados?')">
            <table class="table table-responsive">
                <thead>
                <tr>

                    <?php
                    if ($equipments) {
                        ?>
                        <td><input type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>
                        <?php
                    } else {
                        ?>
                        <td><input disabled="disabled" type="checkbox" onchange="checkAll(this)" name="chk[]"/></td>

                        <?php
                    }
                    ?>
                    <td>Equipamento</td>
                    <td>Tipo</td>
                    <td>Modificador base</td>
                </tr>
                </thead>
                <tbody>

                <?php
                if ($equipments) {
                    foreach ($equipments as $equipment) {

                        ?>
                        <tr>
                            <td><input type="checkbox" name="equipments[]" value="<?= $equipment['idt_equipamento'] ?>">
                            </td>
                            <td><?= $equipment['nme_equipamento'] ?></td>
                            <td><?= $equipment['tpo_equipamento'] ?></td>
                            <td><?= $equipment['mod_base_equipamento'] ?></td>
                            <td>
                                <a href="editEquipment.php?idt=<?= $equipment['idt_equipamento'] ?>"><i class="fa fa-pencil"
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
            if ($equipments) {
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