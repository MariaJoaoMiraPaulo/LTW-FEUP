<?php

session_start();
include_once "config.php";
include_once "restaurantUtils.php";

// If the user didn't come from the edit restaurant page.
if ($_SESSION['token'] !== $_POST['token']) {
    header('HTTP/1.0 403 Forbidden');
    header('Location: ../403.php');
    die();
}
$_SESSION['token'] = generate_random_token();

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
