<?php

include_once('config.php');

function login($username, $password) {
    global $db;
    $statement = $db->prepare('SELECT Password FROM users WHERE username = ? ');
    $statement->execute([$username]);
    $hashed_password = $statement->fetch();
    password_verify($password,$hashed_password);
}

function signUp($username, $password){
    global $db;
    $statement = $db->prepare('INSERT INTO users (username,password) VALUES (?,?)');

    if($statement->execute([$username,$password]))
        echo "User Registed";
    else echo "Impossible to regist user";
}
