<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:14 ص
 */
require('../includes/config.php');
require('../includes/messagesClass.php');
$messageObject = new messagesClass();
$allMessages=$messageObject->getMessages();

include('../templates/admin/index.html');
