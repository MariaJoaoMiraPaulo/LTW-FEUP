<?php

include_once ('config.php');
include_once ('restaurantUtils.php');

$restaurantName = $_POST['name'];
$restaurantAddress = $_POST['address'];
$restaurantLocation = $_POST['location'];
$restaurantWebSite = $_POST['website'];
$username = $_SESSION['login-user'];
$services = $_POST['services']; //array de serviços

$arrayServices=[];


if($restaurantName && $restaurantAddress){
    addRestaurantToUser($username,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite);
} else echo "You must fill at least name and address field";

$id =  getIdRestaurantByName($restaurantName)["id"];

$N = count($services);
for($i=0; $i < $N; $i++) {
    array_push($arrayServices,$services[$i]);
}

foreach ($arrayServices as $service){
    echo $service;
    echo '<br>';
    addServicesToRestaurant($id,$service);
    echo "insert done";
}


