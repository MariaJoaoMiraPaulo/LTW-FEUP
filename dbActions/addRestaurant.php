<?php

include_once ('config.php');
include_once ('restaurantUtils.php');

$restaurantName = $_POST['name'];
$restaurantAddress = $_POST['address'];
$restaurantLocation = $_POST['location'];
$restaurantWebSite = $_POST['website'];
$username = $_SESSION['login-user'];


if($restaurantName && $restaurantAddress){
    addRestaurantToUser($username,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite);
} else echo "You must fill at least name and address field";