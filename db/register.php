<?php

include_once 'config.php';
include_once 'user.php';

$username = $_POST['username'];
$password = $_POST['password'];

if($username && $password)
    signUp($username,$password);
