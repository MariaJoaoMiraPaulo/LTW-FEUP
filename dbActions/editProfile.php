<?php
session_start();
include_once 'user.php';

if ($_SESSION['token'] !== $_POST['token']) {
    header('HTTP/1.0 403 Forbidden');
    die();
}

$_SESSION['token'] = generate_random_token();


$newUsername = $_POST['userName'];
$newFullName = $_POST['name'];
$userName = $_SESSION['login-user'];
$data = $_POST['birthdate'];
$gender = $_POST['gender'];

updateUserProfile($userName,$newUsername,$newFullName,$data,$gender);

header('Location: ../pages/profile.php');

