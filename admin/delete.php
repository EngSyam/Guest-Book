<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:14 ص
 */
require('../includes/config.php');
require('../includes/messagesClass.php');
include'../templates/admin/header.html';
include'../includes/usersClass.php';
if(!usersClass::Check())
    header('LOCATION: login.php');

$deleted = false;
$message = '';
try {
    $id = isset($_GET['id'])?$_GET['id']:0;
    $messageObj = new messagesClass();
    if ($messageObj->deleteMessage($id)){
        $deleted=true;
        $message='Message deleted Successfully';
    }
    else{
        $deleted=false;
        $message='Error deleting Message';
    }
}
catch (Exception $e){
    $deleted=false;
    $message = $e->getMessage().'<br>';
    echo'not deleted';
}
include'../templates/admin/delete.html';
include'../templates/admin/footer.html';