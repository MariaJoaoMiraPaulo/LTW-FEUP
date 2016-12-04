<?php
session_start();
include_once 'user.php';

$newUsername = $_POST['userName'];
$newFullName = $_POST['name'];
$userName = $_SESSION['login-user'];
$data = $_POST['birthdate'];

updateUserProfile($userName,$newUsername,$newFullName,$data);

header('Location: ../pages/profile.php');


