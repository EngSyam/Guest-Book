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

$message = new message();
$message->setTitle('this is test');
$message->setMessage('this is message');
$message->setName('Ahmed Syam');
$message->setEmail('Ahmed@gmail.com');
$message->setPhone('0123456');
//$message->setDate(N);
//$message->setPublished(1);
$messageClass = new messagesClass();
$messageClass->addMessage($message);