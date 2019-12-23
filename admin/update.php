<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:14 ص
 */
require('../includes/config.php');
require('../includes/messagesClass.php');
require('../includes/message.php');
include'../templates/admin/header.html';
include'../includes/usersClass.php';

$messagesOb = new messagesClass();
if(count($_POST)>0)
{
    $messageO = new message();
    $messageO->setId($_POST['id']);
    $messageO->setTitle($_POST['title']);
    $messageO->setMessage($_POST['message']);
    $messageO->setPublished($_POST['published']);
    if($messagesOb->UpdateMessage($messageO))
    {
        $status=true;
        $message='Message Updated Successfully';
    }
    else
    {
        $status=false;
        $message='Error , Message Not Updated ';
    }
    include'../templates/admin/update_result.html';
}
else
{
    $id=isset($_GET['id'])?(int)$_GET['id']:0;
    $messageData= $messagesOb->getMessage($id);
    if(count($messageData)>0)
    {
        include'../templates/admin/update.html';
    }
    else
    {
        $status=false;
        $message='Selected message Not found';
        include'../templates/admin/update_result.html';
    }

}
include'../templates/admin/footer.html';
