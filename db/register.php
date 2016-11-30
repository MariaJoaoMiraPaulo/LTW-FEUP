<?php

include_once 'user.php';

$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$date = $_POST['birthDate'];
$type = $_POST['type'];


if($username && $password)
    signUp($username,$fullname,$date,$type,$password);
