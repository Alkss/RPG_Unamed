<?php
require('../../../config.php');
include('../../../header.php');

if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else{
    if (isset($_POST['name']) && isset($_POST['nPlayers']) && isset($_POST['campaign'])) {
    $table = new Table();
    if ($table->checkIfExistsByName($_POST['name'])) {
        header('Location: addTable.php?error=1');
    }else if ($table->createTable($_POST['name'], $_POST['campaign'], $_POST['password'], $_POST['nPlayers'])) {
        header('Location: addTable.php?success=1');
    }
}
    ?>
    <head>
        <title>RPG_Unnamed - Nova sala</title>
    </head>
<body id="new-table-adm">
<h1><?= RPG_NAME ?></h1>
<h2>Nova Mesa</h2>

<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        ?>
        <div class="alert alert-success"><p>Mesa criada com sucesso!</p></div>
        <?php
    }
}
if(isset($_GET['error'])){
        if ($_GET['error'] == 1)  {
        ?>
        <div class="alert alert-danger"><p>Nome da mesa já existe!</p></div>
        <?php
        }
    }
include '../menuADM.php';
?>
    
    <div class="col-xs-5">
        <form method="post" id="create-new-table-adm">
            <p>
                <label for="name">Mesa</label><br>
                <input class="form-control" type="text" name="name" id="name" required="true">
            </p>
            <p>
                <label for="nPlayers">Quantidade de Jogadores</label><br>
                <input class="form-control" type="number" name="nPlayers" id="nPlayers" required="true">
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


            <button class="btn btn-primary" id="createUser">Criar Mesa</button>
        </form>
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

    <?php
}
