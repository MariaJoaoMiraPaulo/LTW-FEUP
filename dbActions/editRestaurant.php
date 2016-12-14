<?php

session_start();
session_regenerate_id(true);
include_once "config.php";
include_once "restaurantUtils.php";

// If the user didn't come from the edit restaurant page.
if ($_SESSION['token'] !== $_POST['token']) {
    header('HTTP/1.0 403 Forbidden');
    header('Location: ../403.php');
    die();
}
$_SESSION['token'] = generate_random_token();

$restName = htmlspecialchars($_POST['restName']);
$restAddress = htmlspecialchars($_POST['restAddress']);
$restLocation = htmlspecialchars($_POST['restLocation']);
$restWebSite = htmlspecialchars($_POST['restWebSite']);
$restPrice = htmlspecialchars($_POST['restPrice']);
$idRest = htmlspecialchars($_SESSION["restID"]);
$number = htmlspecialchars($_POST['number']);

if(restaurantOwner($_SESSION["restID"],$_SESSION["login-user"])){

    updateRestaurantInfo($idRest,$restName,$restAddress,$restLocation,$restWebSite,$restPrice,$number);
    header("Location:".$_SERVER['HTTP_REFERER']."");
}
else header("Location:".$_SERVER['HTTP_REFERER']."");
