<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:14 ص
 */
require('../includes/config.php');
require('../includes/messagesClass.php');
require('../includes/usersClass.php');
if(!usersClass::Check())
    header('LOCATION: login.php');

$messageObject = new messagesClass();
$allMessages=$messageObject->getMessages();
include('../templates/admin/header.html');
include('../templates/admin/index.html');
include('../templates/admin/footer.html');
