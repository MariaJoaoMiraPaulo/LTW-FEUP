<?php
session_start();
include_once 'user.php';

$newUsername = $_POST['userName'];
$newFullName = $_POST['fullName'];
$userName = $_SESSION['login-user'];

updateUserProfile($userName,$newUsername,$newFullName);

//TODO: Corrigir para location...
echo("<script>location.href = '../pages/index.php';</script>");


