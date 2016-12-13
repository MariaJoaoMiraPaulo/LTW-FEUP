<?php
session_start();
session_regenerate_id(true);
?>
    <!DOCTYPE html>
    <?php

    include_once "header.php";
    include_once "../dbActions/restaurantUtils.php";
    include_once "../dbActions/reviewsUtils.php";
    $restaurant = "";
    $service = "";
    $priceMin = 15;
    $priceMax = 100;
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
                <section class="filters">
                    <h2>Services</h2>
                    <?php
                    getServices($restaurant, $priceMin, $priceMax, $rating, $category, $location);
                    ?>
                    <h2>Categories</h2>

                    <?php
                    getCategories($restaurant, $priceMin, $priceMax, $rating, $service, $location);
                    ?>
                    <h2>Rating</h2>
                    <fieldset class="ratingSearch">

                        <?php
                        if($rating == 5 )
                            echo "<input type=\"radio\" checked  onclick=\"location.href = 'searchRestaurants.php?restaurant=$restaurant&priceMin=$priceMin&priceMax=$priceMax&rating=5&category=$category&location=$location&service=$service';\" id=\"star5S\" name=\"rating\" value=\"5\" /><label class = \"full\" for=\"star5S\" title=\"5 stars\"></label>";
                        else
                            echo "<input type=\"radio\" onclick=\"location.href = 'searchRestaurants.php?restaurant=$restaurant&priceMin=$priceMin&priceMax=$priceMax&rating=5&category=$category&location=$location&service=$service';\" id=\"star5S\" name=\"rating\" value=\"5\" /><label class = \"full\" for=\"star5S\" title=\"5 stars\"></label>";
                        if($rating == 4 )
                            echo "<input type=\"radio\" checked  onclick=\"location.href = 'searchRestaurants.php?restaurant=$restaurant&priceMin=$priceMin&priceMax=$priceMax&rating=4&category=$category&location=$location&service=$service';\" id=\"star54S\" name=\"rating\" value=\"4\" /><label class = \"full\" for=\"star4S\" title=\"4 stars\"></label>";
                        else
                            echo "<input type=\"radio\" onclick=\"location.href = 'searchRestaurants.php?restaurant=$restaurant&priceMin=$priceMin&priceMax=$priceMax&rating=4&category=$category&location=$location&service=$service';\" id=\"star4S\" name=\"rating\" value=\"4\" /><label class = \"full\" for=\"star4S\" title=\"4 stars\"></label>";
                        if($rating == 3 )
                            echo "<input type=\"radio\" checked  onclick=\"location.href = 'searchRestaurants.php?restaurant=$restaurant&priceMin=$priceMin&priceMax=$priceMax&rating=3&category=$category&location=$location&service=$service';\" id=\"star3S\" name=\"rating\" value=\"3\" /><label class = \"full\" for=\"star3S\" title=\"3 stars\"></label>";
                        else
                            echo "<input type=\"radio\" onclick=\"location.href = 'searchRestaurants.php?restaurant=$restaurant&priceMin=$priceMin&priceMax=$priceMax&rating=3&category=$category&location=$location&service=$service';\" id=\"star3S\" name=\"rating\" value=\"3\" /><label class = \"full\" for=\"star3S\" title=\"3 stars\"></label>";
                        if($rating == 2 )
                            echo "<input type=\"radio\" checked  onclick=\"location.href = 'searchRestaurants.php?restaurant=$restaurant&priceMin=$priceMin&priceMax=$priceMax&rating=2&category=$category&location=$location&service=$service';\" id=\"star2S\" name=\"rating\" value=\"2\" /><label class = \"full\" for=\"star2S\" title=\"2 stars\"></label>";
                        else
                            echo "<input type=\"radio\" onclick=\"location.href = 'searchRestaurants.php?restaurant=$restaurant&priceMin=$priceMin&priceMax=$priceMax&rating=2&category=$category&location=$location&service=$service';\" id=\"star2S\" name=\"rating\" value=\"2\" /><label class = \"full\" for=\"star2S\" title=\"2 stars\"></label>";
                        if($rating == 1 )
                            echo "<input type=\"radio\" checked  onclick=\"location.href = 'searchRestaurants.php?restaurant=$restaurant&priceMin=$priceMin&priceMax=$priceMax&rating=1&category=$category&location=$location&service=$service';\" id=\"star1S\" name=\"rating\" value=\"1\" /><label class = \"full\" for=\"star1S\" title=\"1 stars\"></label>";
                        else
                            echo "<input type=\"radio\" onclick=\"location.href = 'searchRestaurants.php?restaurant=$restaurant&priceMin=$priceMin&priceMax=$priceMax&rating=1&category=$category&location=$location&service=$service';\" id=\"star1S\" name=\"rating\" value=\"1\" /><label class = \"full\" for=\"star1S\" title=\"1 stars\"></label>";

                        ?>
                    </fieldset><br><br>

                    <h2>Price</h2>
                    <p>
                        <label for="amount">Price range:</label>
                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <?php
                    echo "<div id=\"slider-range\" min=\"" . $priceMin . "\" max=\"" . $priceMax . "\"></div>";
                    ?>
                    <label id="minValue"></label>
                    <label id="maxValue"></label>

                </section>
            </div>
        </div>
        <div class="main">
            <?php
            setAllRating();
            $result = getRestaurant($restaurant, $service, $priceMin, $priceMax, $rating, $category, $location);
            foreach ($result as $row) {
                echo "<div class=\"container\">";

                $restaurantName = $row['name'];
                $restaurantLocation = $row['location'];
                $restaurantAddress = $row['address'];
                $restaurantPrice = $row['price'];
                $restaurantOpenHours = $row['openHours'];
                $restRating = $row['rating'];
                $id = getIdRestaurantByName($restaurantName);

                echo '<div class="row">';

                echo '<div class="contentPhoto">';
                showFirstRestaurantImage($id);
                echo '</div>';
                echo "<h2 onclick=\"location.href='restaurant.php?id=$id';\">" . $restaurantName . "</h2>";
                echo '<br>'.'</br>';
                echo '<br>'.'</br>';
                echo "<h3>" .$restaurantLocation."</h3>";
                echo '<br>'.'</br>';
                echo "<h1>".$restaurantAddress."</h1>";
                echo '<br>'.'</br>';

               printStarsRating(intval($restRating));

                echo '</div>';

                echo '<div class="row">';

                selectAllServicesFromIdRestaurant($id);
                echo '<br>'.'</br>';
                selectAllCategoriesFromIdRestaurant($id);

                echo '<br>'.'</br>';

                echo "<h4> Cust for Two:</h4>";

                echo '<h1>'.$restaurantPrice."€".'</h1>';
                /*
                                echo "<h1><span style=\"font-weight:bold;font-size:20px\">Hours: </span>".$restaurantOpenHours."</h1>";
                */
                echo '</div>';
                echo "</div>";
            }
            ?>

        </div>
    </div>


<?php
include_once "footer.php";
?>