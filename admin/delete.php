<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:14 ص
 */
require('../includes/config.php');
require('../includes/messagesClass.php');
$id = isset($_GET['id'])?$_GET['id']:0;
$messageObj = new messagesClass();
try {

    if ($messageObj->deleteMessage($id))
        echo 'deleted';
}
catch (Exception $e){
    echo $e->getMessage().'<br>';
    echo'not deleted';
}
