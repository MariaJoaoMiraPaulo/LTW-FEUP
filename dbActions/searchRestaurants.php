<?php

include_once ('config.php');
include_once ('restaurantUtils.php');

function selectAllServicesFromIdRestaurant($idRestaurant){
    global $db;
    $statement = $db->prepare('SELECT  service FROM services WHERE restaurant_id LIKE ? GROUP BY service ORDER BY COUNT(*) DESC ');
    $statement->execute([$idRestaurant]);

    echo "<h1><span style=\"font-weight:bold;font-size:20px\">Services: </span>";
    $i = 0;
    $j = 1;
    while ($row = $statement->fetch())
        $i++;
    $statement->execute([$idRestaurant]);
    while ($row = $statement->fetch()) {

        $service = $row['service'];
        if($j == $i){
            echo  $service ."";}
        else{
            echo  $service .", ";}
        $j++;
    }
    echo "</h1>";
}

function selectAllCategoriesFromIdRestaurant($idRestaurant){
    global $db;
    $statement = $db->prepare('SELECT  category FROM categories WHERE restaurant_id LIKE ? GROUP BY category ORDER BY COUNT(*) DESC ');
    $statement->execute([$idRestaurant]);

    echo "<h1><span style=\"font-weight:bold;font-size:20px\">Cuisines: </span>";
    $i = 0;
    $j = 1;
    while ($row = $statement->fetch())
        $i++;
    $statement->execute([$idRestaurant]);
    while ($row = $statement->fetch()) {

        $service = $row['category'];
        if($j == $i){
            echo  $service ."";}
        else{
            echo  $service .", ";}
        $j++;
    }
    echo "</h1>";
}

function showImage($idRestaurant){

    global $db;
    $statement = $db->prepare('SELECT  name FROM photo WHERE restaurant_id LIKE ? GROUP BY name ORDER BY COUNT(*) DESC ');
    $statement->execute([$idRestaurant]);
    $row = $statement->fetch();
    $fileName = $row['name'];

    echo "<img src=" .$fileName. " />";


}



