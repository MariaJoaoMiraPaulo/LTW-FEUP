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

$aDoor = $_POST['services'];
if(empty($aDoor))
{
    echo("You didn't select any buildings.");
}
else
{
    $N = count($aDoor);

    echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
        array_push($arrayServices,$aDoor[$i]);
    }
}

foreach ($arrayServices as $service){
    echo $service . '<br>';
}


if($restaurantName && $restaurantAddress){
    addRestaurantToUser($username,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite,$arrayServices);
} else echo "You must fill at least name and address field";
