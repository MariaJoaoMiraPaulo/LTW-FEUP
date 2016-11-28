<?php

include_once('config.php');

function login($username, $password) {
    global $db;
    $statement = $db->prepare('SELECT password FROM users WHERE username = ? ');
    $statement->execute([$username]);
    $hashed_password = $statement->fetch()['password'];

    if(password_verify($password, $hashed_password))
        header("location:../index.php");
    else echo "Impossivel Fazer login";
}

function signUp($username,$fullname,$type, $password){
    global $db;
    $statement = $db->prepare('INSERT INTO users (username,fullname,type,password) VALUES (?,?,?,?)');

    if($statement->execute([$username,$fullname,$type,password_hash($password, PASSWORD_DEFAULT)])){
       /* session_start();
        $_SESSION['login-user']=$username;
        session_write_close();*/
        header("location:../index.php");
    }
    else echo "Impossible to regist user";
}
