<?php
session_start();
include_once ('reviewsUtils.php');

$rate=0;
$review = $_POST['review'];
$title = $_POST['title'];
$rate = $_POST['rate'];
$user = $_SESSION['login-user'];
$idRest = $_SESSION['restID'];
$photo = $_POST['fileToUpload'];

if(isset($_POST['rating1'])){
    $rate=1;
}
if(isset($_POST['rating2'])){
    $rate=2;
}
if(isset($_POST['rating3'])){
    $rate=3;
}
if(isset($_POST['rating4'])){
    $rate=4;
}
if(isset($_POST['rating5'])){
    $rate=5;
}

date_default_timezone_set('UTC');
$currentDate =  date("Y/m/d h:i:s");

sendReviewToRestaurant($idRest,$user,$title,$rate,$review,$currentDate,$photo);
header("Location:".$_SERVER['HTTP_REFERER']."");