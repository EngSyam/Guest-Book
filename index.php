<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:13 ص
 */
require('includes/config.php');
require('includes/messagesClass.php');
$messageObject = new messagesClass();
$allMessages=$messageObject->getMessageByStatus(1);
include('templates/front/index.html');

