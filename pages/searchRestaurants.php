<?php
session_start();
?>
    <!DOCTYPE html>
    <?php

    include_once "header.php";
    include_once "../dbActions/restaurantUtils.php";
    include_once "../dbActions/reviewsUtils.php";
    include_once "../dbActions/searchRestaurants.php";
    $restaurant = "";
    $service = "";
    $priceMin = 0;
    $priceMax = 100000;
    $rating = "";
    $category = "";
    $location = "";
    if (preg_match("/[a-z A-Z]/",    $_GET['service'])) {
        $service = $_GET['service'];
    }
    if (preg_match("/[a-z A-Z]/", $_GET['category'])) {
        $category = $_GET['category'];
    }
    if (preg_match("/[a-zA-Z]/", $_GET['restaurant'])) {
        $restaurant = $_GET['restaurant'];
    }
    if (preg_match("/[a-zA-Z]/", $_GET['location'])) {
        $location = $_GET['location'];
    }
    if (preg_match("/[a-zA-Z0-9]/", $_GET['priceMin'])) {
        $priceMin = $_GET['priceMin'];
    }
    if (preg_match("/[a-zA-Z0-9]/", $_GET['priceMax'])) {
        $priceMax = $_GET['priceMax'];
    }
    if (preg_match("/[a-zA-Z0-9]/", $_GET['rating'])) {
        $rating = $_GET['rating'];
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
                    <h2>Services</h2>


                </section>
            </div>
        </div>
        <div class="main">
            <?php
            $result = getRestaurant($restaurant, $service, $priceMin, $priceMax, $rating, $category, $location);
            foreach ($result as $row) {
                echo "<div class=\"container\">";
                $restaurantName = $row['name'];
                $restaurantLocation = $row['location'];
                $restaurantAddress = $row['address'];
                $restaurantPrice = $row['price'];
                $restaurantOpenHours = $row['openHours'];
                $id = getIdRestaurantByName($restaurantName);

                echo "<h2 onclick=\"location.href='restaurant.php?id=$id';\">" . $restaurantName . "</h2>";
                echo "<h3>" .$restaurantLocation."</h3>";
                echo "<h3>".$restaurantAddress."</h3>";
                selectAllServicesFromIdRestaurant($id);
                selectAllCategoriesFromIdRestaurant($id);
                echo "<h1><span style=\"font-weight:bold;font-size:20px\">Cost for two: </span>" .$restaurantPrice." €</h1>";
                echo "<h1><span style=\"font-weight:bold;font-size:20px\">Hours: </span>".$restaurantOpenHours."</h1>";
                echo "</div>";
            }
            ?>

        </div>
    </div>


<?php
include_once "footer.php";
?>