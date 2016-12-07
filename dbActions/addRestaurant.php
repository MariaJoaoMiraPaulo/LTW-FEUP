<?php

include_once ('config.php');
include_once ('restaurantUtils.php');

$restaurantName = $_POST['name'];
$restaurantAddress = $_POST['address'];
$restaurantLocation = $_POST['location'];
$restaurantWebSite = $_POST['website'];
$username = $_SESSION['login-user'];
$services = $_POST['services'];
$categories = $_POST['categories'];
$price = $_POST['price'];

$arrayServices=[];
$arrayCategories=[];


if($restaurantName && $restaurantAddress){
    addRestaurantToUser($username,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite,$price);
} //else echo "You must fill at least name and address field";

$id =  getIdRestaurantByName($restaurantName)["id"];

$N = count($services);
for($i=0; $i < $N; $i++) {
    array_push($arrayServices,$services[$i]);
}

foreach ($arrayServices as $service){
    addServicesToRestaurant($id,$service);
}

$C = count($categories);
for($i=0; $i < $C; $i++) {
    array_push($arrayCategories,$categories[$i]);
}

foreach ($arrayCategories as $category){
    addCategoryToRestaurant($id,$category);
}

header("location:../pages/profile.php");

