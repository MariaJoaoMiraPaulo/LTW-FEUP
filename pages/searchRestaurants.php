<?php
session_start();
?>
    <!DOCTYPE html>
    <?php

    include_once "header.php";
    include_once "../dbActions/restaurantUtils.php";
    include_once "../dbActions/reviewsUtils.php";
    $name = "";
    $service = "";
    $priceMin = 0;
    $priceMax = 100000;
    $rating = "";
    $category = "";
    $location = "";
    if (preg_match("/[a-z A-Z]/", $_GET['service'])) {
        $service = $_GET['service'];
        $title = $service;
    }
    if (preg_match("/[a-z A-Z]/", $_GET['category'])) {
        $service = $_GET['service'];
        $title = $service;
    }
    if (preg_match("/[a-zA-Z]/", $_GET['restaurant'])) {
        $name = $_GET['restaurant'];
        $title = "Searching " . $name;
    }
    if (preg_match("/[a-zA-Z]/", $_GET['location'])) {
        $location = $_GET['location'];
        $title = "Restaurants at " . $location;
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
                <section>
                    <h1>Services</h1>
                    <a method="post" action="searchRestaurants.php?"> </a>
                </section>
            </div>
        </div>
        <div class="main">
            <?php
            $result = getRestaurant($name, $service, $priceMin, $priceMax, $rating, $category, $location);
            foreach ($result as $row) {
                echo "<div class=\"container\">";
                $restaurantName = $row['name'];
                $id = getIdRestaurantByName($restaurantName);
                echo "<h1 onclick=\"location.href='restaurant.php?id=$id';\">" . $restaurantName . "</h1>";
                echo "</div>";
            }
            ?>

        </div>
    </div>


<?php
include_once "footer.php";
?>