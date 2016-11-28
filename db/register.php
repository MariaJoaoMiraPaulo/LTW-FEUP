<?php

include_once 'config.php';
include_once 'user.php';

$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$type = $_POST['type'];


if($username && $password)
    signUp($username,$fullname,$type,$password);
