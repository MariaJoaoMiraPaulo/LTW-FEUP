<?php

include_once('user.php');
include_once('config.php');

function selectTopCategories()
{
    global $db;
    $stmt = $db->prepare('SELECT  category FROM categories GROUP BY category ORDER BY COUNT(*) DESC LIMIT 5');
    $stmt->execute();

    echo '<option value="Category">Category</option> ';

    while ($row = $stmt->fetch()) {
        echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
    }
    return true;
}

function getServices($name, $priceMin, $priceMax, $rating, $category, $location)
{
    global $db;
    $namekeywords = explode(' ', $name);
    $namestring = '%' . implode('% OR LIKE %', $namekeywords) . '%';
    $locationkeywords = explode(' ', $location);
    $locationstring = '%' . implode('% OR LIKE %', $locationkeywords) . '%';
    $ratingkeywords = explode(' ', $rating);
    $ratingstring = '%' . implode('% OR LIKE %', $ratingkeywords) . '%';
    $categorykeywords = explode(' ', $category);
    $categorystring = '%' . implode('% OR LIKE %', $categorykeywords) . '%';

        if($category!=""){
            $stmt=$db->prepare("SELECT * FROM services WHERE restaurant_id IN (SELECT id FROM restaurant WHERE  id 
LIKE (SELECT restaurant_id FROM categories WHERE category LIKE ?)
AND location LIKE ? 
AND name LIKE ?
AND rating LIKE ?
AND price BETWEEN ? AND ?);");
            $stmt->execute([$categorystring,$locationstring, $namestring, $ratingstring, $priceMin, $priceMax]);
        }else{
            $stmt=$db->prepare("SELECT * FROM services WHERE restaurant_id IN (SELECT id FROM restaurant WHERE  
location LIKE ? 
AND name LIKE ?
AND rating LIKE ?
AND price BETWEEN ? AND ?);");
            $stmt->execute([$locationstring, $namestring, $ratingstring, $priceMin, $priceMax]);
        }

    while ($row = $stmt->fetch()) {
        $service = $row['service'];
        echo "<a onclick=\"href='searchRestaurants.php?restaurant=$name&priceMin=$priceMin&priceMax=$priceMax&rating=$rating&category=$category&location=$location&service=$service';\">$service</a><br>";
    }

}


function getCategories($name, $priceMin, $priceMax, $rating, $service, $location)
{
    global $db;
    $namekeywords = explode(' ', $name);
    $namestring = '%' . implode('% OR LIKE %', $namekeywords) . '%';
    $locationkeywords = explode(' ', $location);
    $locationstring = '%' . implode('% OR LIKE %', $locationkeywords) . '%';
    $ratingkeywords = explode(' ', $rating);
    $ratingstring = '%' . implode('% OR LIKE %', $ratingkeywords) . '%';
    $servicekeywords = explode(' ', $service);
    $servicestring = '%' . implode('% OR LIKE %', $servicekeywords) . '%';

    if($service!=""){
        $stmt=$db->prepare("SELECT * FROM categories WHERE restaurant_id IN (SELECT id FROM restaurant WHERE  id 
LIKE (SELECT restaurant_id FROM services WHERE service LIKE ?)
AND location LIKE ? 
AND name LIKE ?
AND rating LIKE ?
AND price BETWEEN ? AND ?);");
        $stmt->execute([$servicestring,$locationstring, $namestring, $ratingstring, $priceMin, $priceMax]);
    }else{
        $stmt=$db->prepare("SELECT * FROM categories WHERE restaurant_id IN (SELECT id FROM restaurant WHERE  
location LIKE ? 
AND name LIKE ?
AND rating LIKE ?
AND price BETWEEN ? AND ?);");
        $stmt->execute([$locationstring, $namestring, $ratingstring, $priceMin, $priceMax]);
    }

    while ($row = $stmt->fetch()) {
        $category = $row['category'];
        echo "<a onclick=\"href='searchRestaurants.php?restaurant=$name&priceMin=$priceMin&priceMax=$priceMax&rating=$rating&category=$category&location=$location&service=$service';\">$category</a><br>";
    }

}



function getRestaurantFromName($name)
{
    global $db;
    $keywords = explode(' ', $name);
    $string = '%' . implode('% OR LIKE %', $keywords) . '%';
    $stmt = $db->prepare('SELECT * FROM restaurant WHERE name LIKE ?');
    $stmt->execute([$string]);
    return $stmt->fetchAll();
}

function getRestaurantFromLocation($location)
{
    global $db;
    $keywords = explode(' ', $location);
    $string = '%' . implode('% OR LIKE %', $keywords) . '%';
    $stmt = $db->prepare('SELECT * FROM restaurant WHERE location LIKE ?');
    $stmt->execute([$string]);
    return $stmt->fetchAll();
}

function getRestaurantFromNameAndLocation($name, $location)
{
    global $db;
    $keywords = explode(' ', $name);
    $string = '%' . implode('% OR LIKE %', $keywords) . '%';
    $stmt = $db->prepare('SELECT * FROM restaurant WHERE name LIKE ? AND location LIKE ?');
    $stmt->execute([$string, $location]);
    return $stmt->fetchAll();
}

function getRestaurantFromService($service)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM restaurant WHERE  id IS (SELECT restaurant_id FROM services WHERE service LIKE ?)");
    $stmt->execute([$service]);
    return $stmt->fetchAll();
}

function getRestaurantFromCategory($category)
{
    global $db;
    $keywords = explode(' ', $category);
    $string = '%' . implode('% OR LIKE %', $keywords) . '%';
    $stmt = $db->prepare("SELECT * FROM restaurant WHERE  id IS (SELECT restaurant_id FROM categories WHERE category LIKE ?)");
    $stmt->execute([$string]);
    return $stmt->fetchAll();
}

function getRestaurantFromCategoryAndLocation($category, $location)
{
    global $db;
    $keywords = explode(' ', $category);
    $string = '%' . implode('% OR LIKE %', $keywords) . '%';
    $stmt = $db->prepare("SELECT * FROM restaurant WHERE  id IS (SELECT restaurant_id FROM categories WHERE category LIKE ?) AND location LIKE ?");
    $stmt->execute([$string, $location]);
    return $stmt->fetchAll();
}

function getRestaurant($name, $service, $priceMin, $priceMax, $rating, $category, $location)
{
    global $db;
    $namekeywords = explode(' ', $name);
    $namestring = '%' . implode('% OR LIKE %', $namekeywords) . '%';
    $locationkeywords = explode(' ', $location);
    $locationstring = '%' . implode('% OR LIKE %', $locationkeywords) . '%';
    $servicekeywords = explode(' ', $service);
    $servicestring = '%' . implode('% OR LIKE %', $servicekeywords) . '%';
    $ratingkeywords = explode(' ', $rating);
    $ratingstring = '%' . implode('% OR LIKE %', $ratingkeywords) . '%';
    $categorykeywords = explode(' ', $category);
    $categorystring = '%' . implode('% OR LIKE %', $categorykeywords) . '%';

    if ($service != "" && $category != ""){
    $stmt = $db->prepare("SELECT * FROM restaurant WHERE  
i d LIKE (SELECT restaurant_id FROM categories WHERE category LIKE ?) 
AND location LIKE ? 
AND id LIKE (SELECT restaurant_id FROM services WHERE service LIKE ?)
AND name LIKE ?
AND rating LIKE ?
AND price BETWEEN ? AND ?;");
    $stmt->execute([$categorystring, $locationstring, $servicestring, $namestring, $ratingstring, $priceMin, $priceMax]);
}else if($service != ""){
        $stmt = $db->prepare("SELECT * FROM restaurant WHERE  
id LIKE (SELECT restaurant_id FROM services WHERE service LIKE ?)
AND location LIKE ? 
AND name LIKE ?
AND rating LIKE ?
AND price BETWEEN ? AND ?;");
        $stmt->execute([$servicestring, $locationstring, $namestring, $ratingstring, $priceMin, $priceMax]);
}else if($category!= ""){
        $stmt = $db->prepare("SELECT * FROM restaurant WHERE  
id LIKE (SELECT restaurant_id FROM categories WHERE category LIKE ?)
AND location LIKE ? 
AND name LIKE ?
AND rating LIKE ?
AND price BETWEEN ? AND ?;");
        $stmt->execute([$categorystring, $locationstring, $namestring, $ratingstring, $priceMin, $priceMax]);
    }else{
        $stmt = $db->prepare("SELECT * FROM restaurant WHERE
location LIKE ? 
AND name LIKE ?
AND rating LIKE ?
AND price BETWEEN ? AND ?;");
        $stmt->execute([$locationstring, $namestring, $ratingstring, $priceMin, $priceMax]);
    }
    return $stmt->fetchAll();
}

function addRestaurantToUser($username, $restaurantName, $restaurantAddress, $restaurantLocation, $restaurantWebSite, $price, $number)
{
    if (strtoupper(getUserInfoByUserName($username, 'type')) == 'OWNER') {
        $id = getUserInfoByUserName($username, 'id');

        global $db;

        $rating = 0;

        $statement = $db->prepare('INSERT INTO restaurant (OwnerID,name,address,location,website,price,rating,phoneNumber) VALUES (?,?,?,?,?,?,?,?)');

        if ($statement->execute([$id, $restaurantName, $restaurantAddress, $restaurantLocation, $restaurantWebSite, $price,$rating,$number])) {
            return true;
        }
        return false;
    }
}

function getUserRestaurants($username)
{
    if (strtoupper(getUserInfoByUserName($username, 'type')) == 'OWNER') {
        $id = getUserInfoByUserName($username, 'id');

        global $db;

        $statement = $db->prepare('SELECT * FROM restaurant WHERE OwnerId = ? ');
        $statement->execute([$id]);

        while ($row = $statement->fetch()) {
            echo '<p>' . $row['name'] . '</p>';
            echo '<p>' . $row['address'] . '</p>';
            echo '<p>' . $row['location'] . '</p>';
            echo '<p>' . $row['website'] . '</p>';
        }
        return true;
    }
}

function getUserRestaurantsName($username)
{

    if (strtoupper(getUserInfoByUserName($username, 'type')) == 'OWNER') {
        $id = getUserInfoByUserName($username, 'id');

        global $db;
        $statement = $db->prepare('SELECT * FROM restaurant WHERE OwnerId = ? ');
        $statement->execute([$id]);

        while ($row = $statement->fetch()) {
            $id = getIdRestaurantByName($row['name']);
            echo '<li>';
            echo '<a href="restaurant.php?id=' . $id . '">' . $row['name'] . '</a>';
            echo '</li>';
        }
        return true;
    }
}

function selectAllCategories()
{
    global $db;
    $stmt = $db->prepare('SELECT  category FROM categories GROUP BY category ORDER BY COUNT(*) DESC ');
    $stmt->execute();

    $i = 0;
    while ($row = $stmt->fetch()) {

        echo '<li>';
        echo ' <input class="filter" data-filter=".check' . $i . '" type="checkbox" id="category' . $i . '">';
        echo '<label class="checkbox-label" for="category' . $i . '">' . $row['category'] . '</label>';
        echo '</li>';
        $i++;
    }
    return true;
}


function selectAllServices()
{
    global $db;
    $stmt = $db->prepare('SELECT service FROM services GROUP BY service ORDER BY COUNT(*) DESC ');
    $stmt->execute();

    $i = 0;
    while ($row = $stmt->fetch()) {

        echo '<li>';
        echo ' <input class="filter" data-filter=".check' . $i . '" type="checkbox" id="service' . $i . '">';
        echo '<label class="checkbox-label" for="service' . $i . '">' . $row['service'] . '</label>';
        echo '</li>';
        $i++;
    }
    return true;
}

function getIdRestaurantByName($restaurantName)
{
    global $db;
    $statement = $db->prepare('SELECT id FROM restaurant WHERE name = ? ');
    $statement->execute([$restaurantName]);
    $res = $statement->fetch();
    return $res[0];
}

function getRestaurantNameById($idRestaurant)
{
    global $db;
    $statement = $db->prepare('SELECT name FROM restaurant WHERE id = ? ');
    $statement->execute([$idRestaurant]);
    $res = $statement->fetch();
    return $res[0];
}

function addServicesToRestaurant($idRestaurant, $service)
{
    global $db;

    $statement = $db->prepare('INSERT INTO services (restaurant_id,service) VALUES (?,?)');

    if ($statement->execute([$idRestaurant, $service])) {
        return true;
    }
    return false;
}

function addCategoryToRestaurant($idRestaurant, $category)
{
    global $db;

    $statement = $db->prepare('INSERT INTO categories (restaurant_id,category) VALUES (?,?)');

    if ($statement->execute([$idRestaurant, $category])) {
        return true;
    }
    return false;
}

function uploadPhotoToRestaurant($target_file, $idRest)
{
    global $db;
    $statement = $db->prepare('INSERT INTO photo (name,restaurant_id) VALUES (?,?)');
    if ($statement->execute([$target_file, $idRest])) {
        return true;
    }
    return false;
}

function restaurantOwner($idRestaurant, $userId)
{
    global $db;
    $statement = $db->prepare('SELECT OwnerID FROM restaurant WHERE id = ? ');
    $statement->execute([$idRestaurant]);
    $res = $statement->fetch()['OwnerID'];

    $id = getIdByUserName($userId);

    if ($res == $id)
        return true;

    return false;
}

function getRestaurantInfoById($idRestaurant, $info)
{

    global $db;
    $statement = $db->prepare('SELECT * FROM restaurant WHERE id = ? ');
    $statement->execute([$idRestaurant]);

    return $statement->fetch()[$info];
}

function updateRestaurantInfo($idRestaurant, $restName, $restAddress, $restLocation, $restWebSite, $restPrice,$number)
{
    if (!trim($restName))
        $restName = getRestaurantInfoById($idRestaurant, 'name');


    if (!trim($restAddress))
        $restAddress = getRestaurantInfoById($idRestaurant, 'address');

    if (!trim($restLocation))
        $restLocation = getRestaurantInfoById($idRestaurant, 'location');

    if (!trim($restWebSite)) {
        $restLocation = getRestaurantInfoById($idRestaurant, 'website');
    }

    if (!trim($restPrice)) {
        $restPrice = getRestaurantInfoById($idRestaurant, 'price');
    }

    if (!trim($number)) {
        $number = getRestaurantInfoById($idRestaurant, 'phoneNumber');
    }

    global $db;
    $statement = $db->prepare('UPDATE restaurant SET name = ?, address = ? , location= ?, website= ?, price= ?, phoneNumber= ? WHERE id = ?');
    $statement->execute([$restName, $restAddress, $restLocation, $restWebSite, $restPrice,$number,$idRestaurant]);
    return $statement->errorCode();
}

function getRestaurantPhotos($idRest)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM photo WHERE restaurant_id=?');
    $stmt->execute([$idRest]);

    $ret = false;

    while ($row = $stmt->fetch()) {
        echo '<img class="mySlides" src=' . $row['name'] . ' hidden="hidden">';
        $ret = true;

    }

    return $ret;
}

function setRating($idRestaurant){

    global $db;
    $statement = $db->prepare('SELECT AVG(userRate) AS rating FROM (SELECT  userRate FROM reviews WHERE restaurant_id LIKE ? GROUP BY userRate ORDER BY COUNT(*) DESC)');
    $statement->execute([$idRestaurant]);
    if($row = $statement->fetch())
    $rating = $row['rating'];

    if(is_null($rating))
        $rating = 0;

    $statement1 = $db->prepare('UPDATE restaurant SET rating = ? WHERE id = ?');
    $statement1->execute([$rating,$idRestaurant]);


}

function setAllRating(){

    global $db;
    $statement = $db->prepare('SELECT id FROM restaurant');
    $statement->execute();
     while($row = $statement->fetch()){
         $restaurantId = $row['id'];
         setRating($restaurantId);
     }

}