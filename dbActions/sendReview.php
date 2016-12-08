<?php

session_start();
include_once ('reviewsUtils.php');

$review = $_POST['review'];
$title = $_POST['title'];
$rate = $_POST['rate'];
$user = $_SESSION['login-user'];
$idRest = $_SESSION['restID'];


date_default_timezone_set('UTC');
$currentDate =  date("Y/m/d h:i:s");


sendReviewToRestaurant($idRest,$user,$title,$rate,$review,$currentDate);

header("Location:".$_SERVER['HTTP_REFERER']."");