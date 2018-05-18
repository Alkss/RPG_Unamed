<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18/05/18
 * Time: 19:49
 */

require('../../../../config.php');
include('../../../../header.php');
$table = new Table();

foreach ($_POST['userRole'] as $key => $singleUser) {
    $table->updateUsersRoles($key, $singleUser, $_GET['idt']);
}
header('Location:' . $_POST['previusPage']);


?>

