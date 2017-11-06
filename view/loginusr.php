<?php
require('../config.php');
include('../header.php');

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/11/17
 * Time: 23:42
 */

?>

<h2>Query = SELECT name, password FROM tb_usuario WHERE name='<?=$_GET['name']?>' AND password='<?=$_GET['password']?>' </h2>
<hr>

<h1>USUARIO COMUM</h1>
