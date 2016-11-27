<?php

include_once 'config.php';

$username = $POST['username'];
$password = $POST['password'];

if($username && $password)
    login($username,$password);
