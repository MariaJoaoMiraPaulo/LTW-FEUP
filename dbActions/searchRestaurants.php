<?php

include_once ('config.php');
include_once ('restaurantUtils.php');


$services = $_POST['services'];
$categories = $_POST['categories'];

$arrayServices=[];
$arrayCategories=[];






$N = count($services);
for($i=0; $i < $N; $i++) {
    array_push($arrayServices,$services[$i]);
}

foreach ($arrayServices as $service){
        echo $service;
}

$C = count($categories);
for($i=0; $i < $C; $i++) {
    array_push($arrayCategories,$categories[$i]);
}

foreach ($arrayCategories as $category){

}

header("location:../pages/profile.php");

