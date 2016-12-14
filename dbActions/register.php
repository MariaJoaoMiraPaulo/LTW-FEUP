<?php

include_once 'user.php';

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$fullname = htmlspecialchars($_POST['fullname']);
$date = htmlspecialchars($_POST['birthDate']);
$type = htmlspecialchars($_POST['type']);
$gender = htmlspecialchars($_POST['gender']);

if ($_SESSION['signup-token'] !== $_POST['signup-token']) {
    header('HTTP/1.0 403 Forbidden');
    die();
}
$_SESSION['token'] = generate_random_token();

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