<?php

include_once ('user.php');
include_once ('config.php');

function selectTopCategories(){
    global $db;
    $stmt = $db->prepare('SELECT  category FROM categories GROUP BY category ORDER BY COUNT(*) DESC LIMIT 5');
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
    $stmt = $db->prepare("SELECT * FROM restaurant WHERE  id IS (SELECT restaurant_id FROM categories WHERE category LIKE ?)");
    $stmt->execute([$string]);
    return $stmt->fetchAll();
}

function addRestaurantToUser($username,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite,$price){
    if(strtoupper(getUserInfoByUserName($username,'type'))=='OWNER'){
        $id = getUserInfoByUserName($username,'id');

        global $db;

        $statement = $db->prepare('INSERT INTO restaurant (OwnerID,name,address,location,website,price) VALUES (?,?,?,?,?,?)');

        if($statement->execute([$id,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite,$price])){
            return true;
        }
        return false;
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

function getUserRestaurantsName($username){

    if(strtoupper(getUserInfoByUserName($username,'type'))=='OWNER'){
        $id = getUserInfoByUserName($username,'id');

        global $db;
        $statement = $db->prepare('SELECT * FROM restaurant WHERE OwnerId = ? ');
        $statement->execute([$id]);

        while ($row = $statement->fetch()) {
            $id = getIdRestaurantByName($row['name'])[0];
            echo '<li>';
            echo '<a href="restaurant.php?id='.$id.'">'.$row['name'].'</a>';
            echo '</li>';
        }
        return true;
    }
}

function selectAllCategories(){
    global $db;
    $stmt = $db->prepare('SELECT  category FROM categories GROUP BY category ORDER BY COUNT(*) DESC ');
    $stmt->execute();

    $i = 0;
    while ($row = $stmt->fetch()) {

        echo '<li>';
        echo ' <input class="filter" data-filter=".check'.$i.'" type="checkbox" id="category'.$i.'">';
        echo '<label class="checkbox-label" for="category'.$i.'">'. $row['category'] .'</label>';
        echo '</li>';
        $i++;
    }
    return true;
}


function selectAllServices(){
    global $db;
    $stmt = $db->prepare('SELECT  service FROM services GROUP BY service ORDER BY COUNT(*) DESC ');
    $stmt->execute();

    $i = 0;
    while ($row = $stmt->fetch()) {

        echo '<li>';
        echo ' <input class="filter" data-filter=".check'.$i.'" type="checkbox" id="service'.$i.'">';
        echo '<label class="checkbox-label" for="service'.$i.'">'. $row['service'] .'</label>';
        echo '</li>';
        $i++;
    }
    return true;
}

function getIdRestaurantByName($restaurantName){
    global $db;
    $statement = $db->prepare('SELECT id FROM restaurant WHERE name = ? ');
    $statement->execute([$restaurantName]);
    $res = $statement->fetch();
    return $res[0];
}

function getRestaurantNameById($idRestaurant){
    global $db;
    $statement = $db->prepare('SELECT name FROM restaurant WHERE id = ? ');
    $statement->execute([$idRestaurant]);
    $res = $statement->fetch();
    return $res[0];
}

function addServicesToRestaurant($idRestaurant,$service){
    global $db;

    $statement = $db->prepare('INSERT INTO services (restaurant_id,service) VALUES (?,?)');

    if($statement->execute([$idRestaurant,$service])){
        return true;
    }
    return false;
}

function addCategoryToRestaurant($idRestaurant,$category){
    global $db;

    $statement = $db->prepare('INSERT INTO categories (restaurant_id,category) VALUES (?,?)');

    if($statement->execute([$idRestaurant,$category])){
        return true;
    }
    return false;
}

function uploadPhotoToRestaurant($target_file,$idRest){
    global $db;
    $statement = $db->prepare('INSERT INTO photo (name,restaurant_id) VALUES (?,?)');
    if($statement->execute([$target_file,$idRest])){
        return true;
    }
    return false;
}

function restaurantOwner($idRestaurant,$userId){
    global $db;
    $statement = $db->prepare('SELECT OwnerID FROM restaurant WHERE id = ? ');
    $statement->execute([$idRestaurant]);
    $res = $statement->fetch()['OwnerID'];

    $id = getIdByUserName($userId);

    if($res == $id)
        return true;

    return false;
}

function getRestaurantInfoById($idRestaurant,$info){

    global $db;
    $statement = $db->prepare('SELECT * FROM restaurant WHERE id = ? ');
    $statement->execute([$idRestaurant]);

    return $statement->fetch()[$info];
}

function updateRestaurantInfo($idRestaurant,$restName, $restAddress,$restLocation,$restWebSite,$restPrice){
    if(!trim($restName))
        $restName = getUserInfogetRestaurantInfoById($idRestaurant,'name');


    if(!trim($restAddress))
         $restAddress = getUserInfogetRestaurantInfoById($idRestaurant,'address');

    if(!trim($restLocation))
        $restLocation = getUserInfogetRestaurantInfoById($restLocation,'location');

    if(!trim($restWebSite)){
        $restLocation = getUserInfogetRestaurantInfoById($restLocation,'website');
    }

    if(!trim($restPrice)){
        $restPrice = getUserInfogetRestaurantInfoById($restPrice,'price');
    }

    global $db;
    $statement = $db->prepare('UPDATE restaurant SET name = ?, address = ? , location= ?, website= ?, price= ? WHERE id = ?');
    $statement->execute([$restName,$restAddress,$restLocation,$restWebSite,$restPrice,$idRestaurant]);
    return $statement->errorCode();
}