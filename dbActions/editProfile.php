<?php
session_start();
include_once 'user.php';

$newUsername = $_POST['userName'];
$newFullName = $_POST['fullName'];
$userName = $_SESSION['login-user'];

if(trim($newFullName)){
    echo "tem valor full name";
}
else {
    echo "NAO tem valor full name";
    $newFullName = getUserInfoByUserName($userName,'fullName');
}

if(trim($newUsername))
    if(!usernameAlreadyExists($newUsername))
        $_SESSION['login-user']=$newUsername;
    else {
        echo "email existe";
        return false;
    }
else{
    echo "NAO tem valor user name";
        $newUsername = $userName;
}


updateUserProfile($userName,$newUsername,$newFullName);

//TODO: Corrigir para location...
echo("<script>location.href = '../pages/index.php';</script>");


