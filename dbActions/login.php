<?php

include_once 'user.php';

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

if($username && $password)
    login($username,$password);
