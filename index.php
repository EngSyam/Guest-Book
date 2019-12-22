<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:13 ص
 */
require('includes/config.php');
require('includes/message.php');
require('includes/messagesClass.php');
try{
$messageClass = new messagesClass();
$messageClass->deleteMessage(4);
}catch (Exception $e){
    echo $e->getMessage();
}