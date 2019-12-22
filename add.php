<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:14 ص
 */
include "includes/config.php";
include "includes/message.php";
include "includes/messagesClass.php";
if(count($_POST)>0)
{
    $message = new message();
    $message->setName($_POST['name']);
    $message->setEmail($_POST['email']);
    $message->setPhone($_POST['phone']);
    $message->setTitle($_POST['title']);
    $message->setMessage($_POST['message']);

    $messagesOB = new messagesClass();
    if($messagesOB->addMessage($message))
        echo 'message added';
}