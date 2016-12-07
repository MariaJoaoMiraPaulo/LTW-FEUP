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

function writeReview($restauranteName,$text,$user){

}