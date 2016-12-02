<?php

include_once 'user.php';

$username = $_POST['username'];
$password = $_POST['password'];

if($username && $password)
    login($username,$password);
