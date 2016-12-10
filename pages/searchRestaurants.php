<?php
session_start();
?>
    <!DOCTYPE html>
    <?php

    include_once "header.php";
    include_once "../dbActions/restaurantUtils.php";
    include_once "../dbActions/reviewsUtils.php";
    if (isset($_POST['submit'])) {
        if (preg_match("/[a-zA-Z]/", $_POST['restaurant']) && preg_match("/[a-zA-Z]/", $_POST['location'])) {
            $name = $_POST['restaurant'];
            $location = $_POST['location'];
            $title = "Searching ".$name." at " . $location;
        }else if(preg_match("/[a-zA-Z]/", $_POST['restaurant']) && $_POST['location']==""){
            $name = $_POST['restaurant'];
            $location = $_POST['location'];
            $title = "Searching ".$name;
        }else if(preg_match("/[a-zA-Z]/", $_POST['location']) && $_POST['restaurant']==""){
            $name = $_POST['restaurant'];
            $location = $_POST['location'];
            $title = "Restaurants at " . $location;
        }
    }

    ?>
    <div class="searchBarContainer">
        <?php
        include "../dbActions/searchBar.php";
        ?>
    </div>
    <div class="restaurantSearchPage">
        <div class="advancedSearch">
            <div class="container">
                <p>Related</p>
            </div>
        </div>
        <div class="main">
            <?php
            if (isset($_POST['submit'])) {
                if (preg_match("/[a-zA-Z]/", $_POST['restaurant']) && preg_match("/[a-zA-Z]/", $_POST['location'])) {
                    $name = $_POST['restaurant'];
                    $location = $_POST['location'];
                    $result1 = getRestaurantFromNameAndLocation($name,$location);
                    $result2 = getRestaurantIdFromCategoryAndLocation($name, $location);
                }else if(preg_match("/[a-zA-Z]/", $_POST['restaurant']) && $_POST['location']==""){
                    $name = $_POST['restaurant'];
                    $title = "Searching ".$name;
                    $result1 = getRestaurantFromName($name);
                    $result2 = getRestaurantIdFromCategory($name);
                }else if(preg_match("/[a-zA-Z]/", $_POST['location']) && $_POST['restaurant']==""){
                    $location = $_POST['location'];
                    $title = "Restaurants at " . $location;
                    $result1 = getRestaurantFromLocation($location);
                }
                if(sizeof($result1)>0 || sizeof($result2)>0){
                    foreach ($result1 as $row) {
                        echo "<div class=\"container\">";
                        $restaurantName = $row['name'];
                        $id = getIdRestaurantByName($restaurantName);
                        echo "<h1 onclick=\"location.href='restaurant.php?id=$id';\">" . $restaurantName . "</h1>";
                        echo "</div>";
                    }
                    foreach ($result2 as $row) {
                        echo "<div class=\"container\">";
                        $restaurantName = $row['name'];
                        $id = getIdRestaurantByName($restaurantName);
                        echo "<h1 onclick=\"location.href='restaurant.php?id=$id';\">" . $restaurantName . "</h1>";
                        echo "</div>";
                    }
                }
            }
            ?>

        </div>
    </div>


<?php
include_once "footer.php";
?>