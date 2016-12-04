<?php

include_once ('user.php');
include_once ('config.php');

function selectTopCategories(){
    global $db;
    $stmt = $db->prepare('SELECT  category FROM restaurant GROUP BY category ORDER BY COUNT(*) DESC LIMIT 5');
    $stmt->execute();

    echo '<option value="Category">Category</option> ';

    while ($row = $stmt->fetch()) {
        echo '<option value="'. $row['category'] .'">'. $row['category'] .'</option>';
    }
    return true;
}

function getRestaurantIdFromName($name){
    global $db;
    $stmt = $db->prepare('SELECT id FROM restaurant WHERE name LIKE ?');
    $stmt->execute([$name]);

    return $stmt->fetchAll();
}

function addRestaurantToUser($username,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite){
    if(strtoupper(getUserInfoByUserName($username,'type'))=='OWNER'){
        $id = getUserInfoByUserName($username,'id');

        global $db;

        $statement = $db->prepare('INSERT INTO restaurant (OwnerID,name,address,location,website) VALUES (?,?,?,?,?)');

        if($statement->execute([$id,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite])){
            header("location:../pages/profile.php");
            exit();
        }
        else echo "Impossible to add Restaurant";








    }
}