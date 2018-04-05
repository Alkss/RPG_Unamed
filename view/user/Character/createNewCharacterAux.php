<?php
$db = new DataBase();
$alignments = $db->search("select * from td_alinhamento");
$race = $db->search("select idt_raca,nme_raca from td_raca");
$classe = $db->search("select idt_classe,nme_classe from td_classe");
$language = $db->search("select * from td_linguagem");
$language = $db->search("select * from td_linguagem");
$cor_olho = $db->search("select * from td_cor_olho");
$religiao = $db->search("select * from td_divindade");
?>

<body id="create-new-character">

<h1><?= RPG_NAME ?></h1>
<h2>Novo Personagem</h2>
<div class="container">
    <div id="form">
        <div class="col-xs-6">
            <form method="post" id="create-new-character">
               
                <p>
                    <label for="nme_personagem" id="name-label-post">Nome do personagem</label><br>
                    <input class="form-control" type="text" name="nme_personagem" id="nme_personagem"
                           onclick="colorNameBlack();">
                </p>
                <p>
                    <label for="exp_personagem">Exp Personagem</label><br>
                    <input class="form-control" type="number" name="exp_personagem" id="exp_personagem">
                </p>
                <p>
                    <label for="classe">Classe</label><br>
                    <select id="classe" name="classe" class="form-control">
                        <option value="" selected hidden>-- Selecione uma opçao --</option>
                        <?php
                        foreach ($classe as $linha) {
                            ?>
                            <option value="<?= $linha['idt_classe'] ?>"><?= $linha['nme_classe'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <label for="racas">Raça</label><br>
                    <select id="racas" name="racas" class="form-control">
                        <option value="" selected hidden>-- Selecione uma opçao --</option>
                        <?php
                        foreach ($race as $linha) {
                            ?>
                            <option value="<?= $linha['idt_raca'] ?>"><?= $linha['nme_raca'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <label for="gen_personagem">Genero do Personagem</label><br>
                    <select id="gen_personagem" name="gen_personagem" class="form-control">
                        <option value="" selected hidden>-- Selecione um genero --</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </p>

                <p>
                    <label for="pes_personagem">Peso do Personagem</label><br>
                    <input class="form-control" type="number" name="pes_personagem" id="pes_personagem">
                </p>

                <p>
                    <label for="alt_personagem">Altura do Personagem</label><br>
                    <input class="form-control" type="number" name="alt_personagem" id="alt_personagem">
                </p>

                <p>
                    <label for="dsc_cabelo_pesonagem">Descriçao do Cabelo</label><br>
                    <select id="dsc_cabelo_pesonagem" name="dsc_cabelo_pesonagem" class="form-control">
                        <option value="" selected hidden>-- Selecione uma opçao --</option>
                        <option value="Careca">Careca</option>
                        <option value="Longo">Cabelo Longo</option>
                        <option value="Curto">Cabelo Curto</option>
                        <option value="Rastafari">Rastafari</option>
                    </select>
                </p>

                <p>
                    <label for="cor_olho">Cor dos olhos</label><br>
                    <select id="cor_olho" name="cor_olho" class="form-control">
                        <option value="" selected hidden>-- Selecione uma opçao --</option>
                        <?php
                        foreach ($cor_olho as $linha) {
                            ?>
                            <option value="<?= $linha['idt_cor_olho'] ?>"><?= $linha['nme_cor_olho'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </p>
        </div>
        <div class="col-xs-6">
            <p>
                <label for="img_personagem" id="name-label-post">URL da Imagem do Personagem</label><br>
                <input class="form-control" type="text" name="img_personagem" id="img_personagem"
                       onclick="colorNameBlack();"
                       placeholder="Exemplo: https://i.imgur.com/jW4IliJ.jpg">
            </p>

            <p>
                <label for="hst_personagem">História do Personagem</label><br>
                <textarea name="hst_personagem" id="hst_personagem" class="form-control"
                          style="height: 180px"></textarea>
            </p>

            <p>
                <label for="inf_adicional_personagem">Informaçao adicional do Personagem</label><br>
                <textarea name="inf_adicional_personagem" id="inf_adicional_personagem" class="form-control"
                          style="height: 180px"></textarea>
            </p>

            <p>
                <label for="religiao">Religiao</label><br>
                <select id="religiao" name="religiao" class="form-control">
                    <option value="" selected hidden>-- Selecione uma opçao --</option>
                    <?php
                    foreach ($religiao as $linha) {
                        ?>
                        <option value="<?= $linha['idt_religiao'] ?>"><?= $linha['nme_religiao'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>

            <p>
                <label for="alignments">Alinhamento</label><br>
                <select id="alignments" name="alignments" class="form-control">
                    <option value="" selected hidden>-- Selecione uma opçao --</option>
                    <?php
                    foreach ($alignments as $linha) {
                        ?>
                        <option value="<?= $linha['idt_alinhamento'] ?>"><?= $linha['nme_alinhamento'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
            
        </div>
        <button class="btn btn-primary" id="createUser">Criar Personagem</button>
        </form>
    </div>
</div>
</body>
<script>

    function colorNameBlack() {
        var text = document.getElementById('name-post')
        text.setAttribute('style', 'color:black');
    }

    function showPass() {
        var password = document.getElementById('password');
        password.removeAttribute("type");
    }
    function hidePass() {
        var password = document.getElementById('password');
        password.setAttribute('type', 'password')
    }


</script>

