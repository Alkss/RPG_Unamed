<?php
$db = new DataBase();
$alignments = $db->search("select * from td_alinhamento");
$race = $db->search("select idt_raca,nme_raca, dsc_raca from td_raca");
$classe = $db->search("select idt_classe,nme_classe, dsc_classe from td_classe");
$language = $db->search("select * from td_linguagem");
$language = $db->search("select * from td_linguagem");
$religiao = $db->search("select * from td_divindade");
?>

<body id="create-new-character">

<h1><?= RPG_NAME ?></h1>
<h2>Novo Personagem</h2>
<div id="form">
    <form method="post" id="create-new-character">
        <div class="container">
            <div class="col-xs-6" id="leftDiv">
                <div class="col-xs-12">
                    <label for="nme_personagem" id="name-label-post">Nome do personagem</label><br>
                    <input class="form-control" type="text" name="nme_personagem" id="nme_personagem"
                           required="required">
                </div>
                <div class="col-xs-12">
                    <label for="exp_personagem">Exp Personagem</label><br>
                    <input class="form-control" type="number" name="exp_personagem" id="exp_personagem"
                           required="required">
                </div>
                <div class="col-xs-11">
                    <label for="classe">Classe</label><br>
                    <select id="classe" name="classe" class="form-control" required="required">
                        <option value="" selected hidden>-- Selecione uma opçao --</option>
                        <?php
                        foreach ($classe as $linha) {
                            ?>
                            <option value="<?= $linha['idt_classe'] ?>"><?= $linha['nme_classe'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-1">
                    <a data-toggle="modal" data-target="#classModal"><i class="fa fa-info-circle fa-2x"
                                                                        aria-hidden="true"></i></a>
                </div>
                <div class="col-xs-11">
                    <label for="racas">Raça</label><br>
                    <select id="racas" name="racas" class="form-control" required="required">
                        <option value="" selected hidden>-- Selecione uma opçao --</option>
                        <?php
                        foreach ($race as $linha) {
                            ?>
                            <option value="<?= $linha['idt_raca'] ?>"><?= $linha['nme_raca'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-1">
                    <a data-toggle="modal" data-target="#raceModal"><i class="fa fa-info-circle  fa-2x"
                                                                       aria-hidden="true"></i></a>
                </div>

                <div class="col-xs-11">
                    <label for="religiao">Religiao</label><br>
                    <select id="religiao" name="religiao" class="form-control" required="required">
                        <option value="" selected hidden>-- Selecione uma opçao --</option>
                        <?php
                        foreach ($religiao as $linha) {
                            ?>
                            <option value="<?= $linha['idt_divindade'] ?>"><?= $linha['nme_divindade'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-1">
                    <a data-toggle="modal" data-target="#relModal"><i class="fa fa-info-circle fa-2x"
                                                                      aria-hidden="true"></i></a>
                </div>

                <div class="col-xs-12">
                    <label for="gen_personagem">Genero do Personagem</label><br>
                    <select id="gen_personagem" name="gen_personagem" class="form-control" required="required">
                        <option value="" selected hidden>-- Selecione um genero --</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>

                <div class="col-xs-12">
                    <label for="pes_personagem">Peso do Personagem</label><br>
                    <input class="form-control" type="number" name="pes_personagem" id="pes_personagem"
                           required="required">
                </div>

                <div class="col-xs-12">
                    <label for="alt_personagem">Altura do Personagem</label><br>
                    <input class="form-control" type="number" min="0.00" max="10.00" step="0.01" name="alt_personagem"
                           id="alt_personagem" required="required">
                </div>

                <div class="col-xs-12">
                    <label for="dsc_cabelo_pesonagem">Descriçao do Cabelo</label><br>
                    <select id="dsc_cabelo_pesonagem" name="dsc_cabelo_pesonagem" class="form-control"
                            required="required">
                        <option value="" selected hidden>-- Selecione uma opçao --</option>
                        <option value="Careca">Careca</option>
                        <option value="Longo">Cabelo Longo</option>
                        <option value="Curto">Cabelo Curto</option>
                        <option value="Rastafari">Rastafari</option>
                    </select>
                </div>

                <div class="col-xs-12">
                    <label for="cor_olho">Cor dos olhos</label><br>
                    <input class="form-control" type="text" name="cor_olho" id="cor_olho" required="required">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="col-xs-12">
                    <label for="img_personagem" id="name-label-post">URL da Imagem do Personagem</label><br>
                    <input class="form-control" type="text" name="img_personagem" id="img_personagem"
                           onclick="colorNameBlack();"
                           placeholder="Exemplo: https://i.imgur.com/jW4IliJ.jpg" required="required">
                </div>

                <div class="col-xs-12">
                    <label for="hst_personagem">História do Personagem</label><br>
                    <textarea name="hst_personagem" id="hst_personagem" class="form-control"
                              style="height: 180px"></textarea>
                </div>

                <div class="col-xs-12">
                    <label for="inf_adicional_personagem">Informaçao adicional do Personagem</label><br>
                    <textarea name="inf_adicional_personagem" id="inf_adicional_personagem" class="form-control"
                              style="height: 180px"></textarea>
                </div>

                <div class="col-xs-12">
                    <label for="alignments">Alinhamento</label><br>
                    <select id="alignments" name="alignments" class="form-control" required="required">
                        <option value="" selected hidden>-- Selecione uma opçao --</option>
                        <?php
                        foreach ($alignments as $linha) {
                            ?>
                            <option value="<?= $linha['idt_alinhamento'] ?>"><?= $linha['nme_alinhamento'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-12">
                    <button class="btn btn-primary" id="createUser">Criar Personagem</button>
                </div>
            </div>
    </form>
</div>
</div>
<?php
include 'modal/class_race_rel.php';
?>

</body>

