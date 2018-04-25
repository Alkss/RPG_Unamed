<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23/04/18
 * Time: 16:50
 */
require('../../../config.php');
include('../../../header.php');
$db = new DataBase();
$char = new Character();
$selectedChar = $char->selectAll("idt_personagem = " . $_GET['char']);
$race = $char->selectRace("idt_personagem = " . $_GET['char']);
$class = $char->selectClass("idt_personagem = " . $_GET['char']);
$alignment = $char->selectAlignment("idt_personagem = " . $_GET['char']);
$divinity = $char->selectDivinity("idt_personagem = " . $_GET['char']);
$lang = $char->selectLang("idt_personagem = " . $_GET['char']);

var_dump($lang);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $selectedChar[0]['nme_personagem'] ?></title>
</head>
<body id="char-page">
<h1><?= RPG_NAME ?></h1>
<h2><?= $selectedChar[0]['nme_personagem'] ?></h2>
<?php
include '../Table/menu.php';
?>
<div class="col-xs-6">
    <div class="row">
        <div class="col-xs-6" id="char-img">
            <?php
            $imgURL = $selectedChar[0]['img_personagem'];
            echo '<img id="charImg" src="' . $imgURL . '">'
            ?>
        </div>
        <div class="col-xs-6">
            <a class="btn btn-primary">Editar dados</a>
            <a class="btn btn-primary">Editar pertences</a>
            <a class="btn btn-primary">Excluir</a>
        </div>
    </div>
    <div class="row">
        <table>
            <tr>
                <th>Raça:</th>
                <th>Classe:</th>
                <th>Gênero:</th>
                <th>Alinhamento:</th>
                <th>Cor dos Olhos:</th>
                <th>Altura:</th>
                <th>Peso:</th>
            </tr>
            <tr>
                <td><?= $race[0]['nme_raca'] ?></td>
                <td><?= $class[0]['nme_classe'] ?></td>
                <td><?php
                    if ($selectedChar[0]['gen_personagem'] == 'M') {
                        ?>
                        Masculino
                        <?php
                    } else {
                        ?>
                        Feminino
                        <?php
                    }
                    ?>
                </td>
                <td><?= $alignment[0]['nme_alinhamento'] ?></td>
                <td><?= $selectedChar[0]['cor_olho_personagem'] ?></td>
                <td><?= $selectedChar[0]['alt_personagem'] ?>M</td>
                <td><?= $selectedChar[0]['pes_personagem'] ?>Kg</td>
            </tr>
            <tr>
                <th colspan="7" id="histHead">História</th>
            </tr>
            <tr>
                <td colspan="7" id="histBody"><?= $selectedChar[0]['hst_personagem'] ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="col-xs-4" id="righ-side-table">
    <div class="row">

        <h5>Divindades</h5>
        <?php
        foreach ($divinity as $singleDivinity) {
            ?>
            <h6><?= $singleDivinity['nme_divindade'] ?></h6>
            
            <?php
        }
        ?>
        </table>
    </div>
    <div class="row">
        <div class="row">
            <h5>Idiomas</h5>
            <?php
            foreach ($lang as $singleLang) {
                ?>
                <h6><?= $singleLang['nme_linguagem'] ?></h6>
                <?php
            }
            ?>
            </table>
        </div>
    </div>
    <div class="row">
        Divindades
    </div>
    <div class="row">
        Divindades
    </div>
    <div class="row">
        Divindades
    </div>
    <div class="row">
        Divindades
    </div>
    <div class="row">
        Divindades
    </div>
</div>
</body>
</html>