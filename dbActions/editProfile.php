<?php
session_start();
session_regenerate_id(true);
include_once 'user.php';


if ($_SESSION['token'] !== $_POST['token']) {
    header('HTTP/1.0 403 Forbidden');
    die();
}
$_SESSION['token'] = generate_random_token();
$newUsername = htmlspecialchars($_POST['userName']);
$newFullName = htmlspecialchars($_POST['name']);
$userName = htmlspecialchars($_SESSION['login-user']);
$data = htmlspecialchars($_POST['birthdate']);
$gender = htmlspecialchars($_POST['gender']);


updateUserProfile($userName,$newUsername,$newFullName,$data,$gender);

header('Location: ../profile.php');

