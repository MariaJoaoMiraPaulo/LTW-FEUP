<?php

include_once 'user.php';

$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$date = $_POST['birthDate'];
$type = $_POST['type'];
$gender = $_POST['gender'];


if($username && $password){
    if(!usernameAlreadyExists($username)){
        if(validatePassword($password))
            signUp($username,$fullname,$date,$type,$password,$gender);
        else echo "Password must be at least 6 characters.";
    }
    else echo "Choose a different email address. This one is not available. If this is you log in now.";

}