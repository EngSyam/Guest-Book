<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:14 ص
 */
require('../includes/config.php');
require('../includes/messagesClass.php');
$keyword = isset($_GET['keyword'])?$_GET['keyword']:'';
$messageObj = new messagesClass();
$allMessages=$messageObj->SearchMessages($keyword);
include('../templates/admin/header.html');
include('../templates/admin/index.html');
include('../templates/admin/footer.html');

