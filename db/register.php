<?php

include_once 'config.php';

$username = $POST['username'];
$password = $POST['password'];

if($username && $password)
    signUp($username,$password);
