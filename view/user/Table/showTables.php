<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08/02/18
 * Time: 20:00
 */
require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
}


?>
<head>
    <title><?= RPG_NAME ?></title>
</head>
<body id="show-tables-user">
<div class="container">


</div>
</body>

