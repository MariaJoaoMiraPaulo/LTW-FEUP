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
        else {
            header("Location:".$_SERVER['HTTP_REFERER']."");
            $_SESSION["ERROR"] = "Password must be at least 6 characters.";
        }
    }
    else {
        header("Location:".$_SERVER['HTTP_REFERER']."");
        $_SESSION["ERROR"] = "Choose a different email address. This one is not available. If this is you log in now.";
    }
}
else{
    header("Location:".$_SERVER['HTTP_REFERER']."");
$_SESSION["ERROR"] = "You must fill ate least Username and Password Field ! ";}