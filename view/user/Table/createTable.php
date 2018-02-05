<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/02/18
 * Time: 19:28
 */
require('../../../config.php');
include('../../../header.php');


if ($_SESSION['logado'] != 1) {
    header('location:' . URL . '/view/index.php');
} else {
    ?>
    
    
    <?php
}
