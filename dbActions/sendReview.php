<?php
session_start();
include_once ('reviewsUtils.php');

$rate=0;
$review = $_POST['review'];
$title = $_POST['title'];
$rate = $_POST['rate'];
$user = $_SESSION['login-user'];
$idRest = $_SESSION['restID'];

if(isset($_POST['rating1'])){
    $rate+=1;
}
if(isset($_POST['rating2'])){
    $rate+=1;
}
if(isset($_POST['rating3'])){
    $rate+=1;
}
if(isset($_POST['rating4'])){
    $rate+=1;
}
if(isset($_POST['rating5'])){
    $rate+=1;
}

date_default_timezone_set('UTC');
$currentDate =  date("Y/m/d h:i:s");

sendReviewToRestaurant($idRest,$user,$title,$rate,$review,$currentDate);

header("Location:".$_SERVER['HTTP_REFERER']."");