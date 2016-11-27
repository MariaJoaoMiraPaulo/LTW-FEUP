<?php

include_once('config.php');

function login($username, $password) {
    global $db;
    $statement = $db->prepare('SELECT Password FROM Users WHERE Username = "?"');
    $statement->execute([$username]);
    $hashed_password = $statement->fetch();
    password_verify($password,$hashed_password);
}
