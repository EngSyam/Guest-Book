<?php
require('../includes/config.php');
require('../includes/usersClass.php');
if(usersClass::Check())
    header('LOCATION: index.php');

$users=new usersClass();
if(count($_POST)>0)
{
    if($users->login($_POST['username'],$_POST['password']))
    {
        header('LOCATION:index.php');
    }
    else
    {
        $message='Invalid Data';
        include'../templates/admin/login.html';
    }
}
include'../templates/admin/login.html';
