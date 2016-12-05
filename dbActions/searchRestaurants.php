<?php

include_once ('restaurantUtils.php');

if(isset($_POST['submit'])) {
    if (preg_match("/[a-zA-Z]/", $_POST['restaurant'])) {
        $name = $_POST['restaurant'];
        $result = getRestaurantIdFromName($name);
        foreach($result as $row){
            $restaurantName = $row['name'];
            echo "<ul>\n";
            echo "<li>"   .$restaurantName . "</a></li>\n";
            echo "</ul>";
        }
        $result = getRestaurantIdFromCategory($name);
        foreach($result as $row){
            $restaurantName = $row['name'];
            echo "<ul>\n";
            echo "<li>"   .$restaurantName . "</a></li>\n";
            echo "</ul>";
        }
    }
}
