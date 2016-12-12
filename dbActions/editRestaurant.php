<?php

session_start();
include_once "config.php";
include_once "restaurantUtils.php";


$restName = $_POST['restName'];
$restAddress = $_POST['restAddress'];
$restLocation = $_POST['restLocation'];
$restWebSite = $_POST['restWebSite'];
$restPrice = $_POST['restPrice'];
$idRest = $_SESSION["restID"];
$number = $_POST['number'];

if(restaurantOwner($_SESSION["restID"],$_SESSION["login-user"])){
    updateRestaurantInfo($idRest,$restName,$restAddress,$restLocation,$restWebSite,$restPrice,$number);
    header("Location:".$_SERVER['HTTP_REFERER']."");
}
else header("Location:".$_SERVER['HTTP_REFERER']."");
