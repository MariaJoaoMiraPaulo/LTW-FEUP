<?php
session_start();
include_once 'user.php';

$newUsername = $_POST['userName'];
$newFullName = $_POST['name'];
$userName = $_SESSION['login-user'];
$data = $_POST['birthdate'];
$gender = $_POST['gender'];

updateUserProfile($userName,$newUsername,$newFullName,$data,$gender);

header('Location: ../pages/profile.php');


