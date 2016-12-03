<?php
session_start();
include_once 'user.php';

$newUsername = $_POST['userName'];
$newFullName = $_POST['name'];
$userName = $_SESSION['login-user'];

updateUserProfile($userName,$newUsername,$newFullName);

header('Location: ../pages/profile.php');


