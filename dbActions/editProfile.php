<?php
session_start();
include_once 'user.php';

$newUsername = htmlspecialchars($_POST['userName']);
$newFullName = htmlspecialchars($_POST['name']);
$userName = htmlspecialchars($_SESSION['login-user']);
$data = htmlspecialchars($_POST['birthdate']);
$gender = htmlspecialchars($_POST['gender']);


updateUserProfile($userName,$newUsername,$newFullName,$data,$gender);

header('Location: ../pages/profile.php');

