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
       // echo '<input type="checkbox" name="services[]" value="'. $row['service'] .'">'. $row['service'] .'<br>';
        echo ' <input class="filter" data-filter=".check'.$i.'" type="checkbox" name="restaurant" id="service'.$i.'" value="porta">';
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
    return $statement->fetch();
}

function getRestaurantNameById($idRestaurant){
    global $db;
    $statement = $db->prepare('SELECT name FROM restaurant WHERE id = ? ');
    $statement->execute([$idRestaurant]);
    return $statement->fetch();
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

function selectAllServicesFromIdRestaurant($idRestaurant){
    global $db;
    $statement = $db->prepare('SELECT  service FROM services WHERE restaurant_id LIKE ? GROUP BY service ORDER BY COUNT(*) DESC ');
    $statement->execute([$idRestaurant]);

    echo "<h1>Cuisine: ";
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