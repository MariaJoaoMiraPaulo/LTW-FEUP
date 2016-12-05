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
    $keywords = explode(' ', $name);
    $string = '%' . implode('% OR LIKE %', $keywords) . '%';
    $stmt = $db->prepare('SELECT * FROM restaurant WHERE name LIKE ?');
    $stmt->execute([$string]);
    return $stmt->fetchAll();
}

function getRestaurantIdFromCategory($category){
    global $db;
    $keywords = explode(' ', $category);
    $string = '%' . implode('% OR LIKE %', $keywords) . '%';
    $stmt = $db->prepare("SELECT * FROM restaurant WHERE category LIKE ?");
    $stmt->execute([$string]);
    return $stmt->fetchAll();
}

function addRestaurantToUser($username,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite,$services){
    if(strtoupper(getUserInfoByUserName($username,'type'))=='OWNER'){
        $id = getUserInfoByUserName($username,'id');

        global $db;

        $statement = $db->prepare('INSERT INTO restaurant (OwnerID,name,address,location,website,services) VALUES (?,?,?,?,?,?)');

        if($statement->execute([$id,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite,$services])){
            header("location:../pages/profile.php");
            exit();
        }
        else echo "Impossible to add Restaurant";
    }
}

function getUserRestaurants($username){
    if(strtoupper(getUserInfoByUserName($username,'type'))=='OWNER'){
        $id = getUserInfoByUserName($username,'id');

        global $db;

        $statement = $db->prepare('SELECT * FROM restaurant WHERE OwnerId = ? ');
        $statement->execute([$id]);

        while ($row = $statement->fetch()) {
            echo '<p>'. $row['name'] .'</p>';
            echo '<p>'. $row['address'] .'</p>';
            echo '<p>'. $row['location'] .'</p>';
            echo '<p>'. $row['website'] .'</p>';
        }
        return true;
    }
}