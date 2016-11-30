<?php
session_start();

include_once 'user.php';

$newUsername = $_POST['userName'];
$newFullName = $_POST['fullName'];
$userName = $_SESSION['login-user'];


$id = getIdByUserName($userName);
updateUserProfile($id,$newUsername,$newFullName);
header("location:../index.php");

