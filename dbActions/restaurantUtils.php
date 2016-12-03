<?php

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