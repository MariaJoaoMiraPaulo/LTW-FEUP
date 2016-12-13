<?php
session_start();
include_once 'user.php';

$newUsername = htmlspecialchars($_POST['userName']);
$newFullName = htmlspecialchars($_POST['name']);
$userName = htmlspecialchars($_SESSION['login-user']);
$data = htmlspecialchars($_POST['birthdate']);
$gender = htmlspecialchars($_POST['gender']);
$_SESSION['token'] = generate_random_token();
if ($_SESSION['token'] !== $_POST['token']) {
    header('HTTP/1.0 403 Forbidden');
    die();
}


updateUserProfile($userName,$newUsername,$newFullName,$data,$gender);

header('Location: ../pages/profile.php');

