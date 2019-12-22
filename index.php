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
    echo'<pre>';
$messageClass = new messagesClass();
print_r($messageClass->getMessage(60));
}catch (Exception $e){
    echo $e->getMessage();
}