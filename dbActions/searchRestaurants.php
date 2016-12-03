<?php

include_once ('restaurantUtils.php');


if(preg_match ("/[a-zA-Z]/", $_POST['restaurant'])){
    $name=$_POST['restaurant'];
    getRestaurantIdFromName($name);
}
