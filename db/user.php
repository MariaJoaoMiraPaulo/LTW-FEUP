<?php

session_start();
include_once('config.php');


function login($username, $password) {
    global $db;
    $statement = $db->prepare('SELECT password,fullName FROM users WHERE username = ? ');
    $statement->execute([$username]);

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $hashed_password = $result['password'];
    $fullname = $result['fullName'];

    if(password_verify($password, $hashed_password)){
        $_SESSION['login-user']=$username;
        $_SESSION['user-full-name']=$fullname;
        header("location:../index.php");
    }
    else echo "Impossivel Fazer login";
}

function signUp($username,$fullname,$type, $password){
    global $db;
    $statement = $db->prepare('INSERT INTO users (username,fullname,type,password) VALUES (?,?,?,?)');

    if($statement->execute([$username,$fullname,$type,password_hash($password, PASSWORD_DEFAULT)])){
        $_SESSION['login-user']=$username;
        $_SESSION['user-full-name']=$fullname;
        header("location:../index.php");
    }
    else echo "Impossible to regist user";
}
