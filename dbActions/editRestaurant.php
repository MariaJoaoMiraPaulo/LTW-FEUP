<?php

session_start();
include_once "config.php";
include_once "restaurantUtils.php";


$restName = $_POST['restName'];
$restAddress = $_POST['restAddress'];
$restLocation = $_POST['restLocation'];
$restWebSite = $_POST['restWebSite'];
$restPrice = $_POST['restPrice'];

if(restaurantOwner($_SESSION["restID"],$_SESSION["login-user"])){
    updateRestaurantInfo($_SESSION["restID"],$restName,$restAddress,$restLocation,$restWebSite,$restPrice);
    header("Location:".$_SERVER['HTTP_REFERER']."");
}
header("Location:".$_SERVER['HTTP_REFERER']."");