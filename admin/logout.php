<?php
include'../includes/usersClass.php';
usersClass::logout();
header('LOCATION:login.php');