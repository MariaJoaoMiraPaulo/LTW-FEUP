<?php
$title = "Restaurants";      // Set the title

include_once('../dbActions/restaurantUtils.php');
include "header.php";
?>
    <!DOCTYPE html>


    <main class="cd-main-content">
        <div class="cd-tab-filter-wrapper">

                <form method="post" action="searchRestaurants.php" class="action-wrapper">
                    <input class="select-location" type="text" name="search" placeholder="Location">
                    <input class="search-bar" type="text" name="restaurant" placeholder="Search for restaurants or cuisines...">
                    <input class="button" type="submit" name="submit" value="Search">
                </form>

        </div> <!-- cd-tab-filter-wrapper -->

        <section class="cd-gallery">
            <ul>
                <?php
                if(isset($_POST['submit'])) {
                    if (preg_match("/[a-zA-Z]/", $_POST['restaurant'])) {
                        $name = $_POST['restaurant'];

                        $result = getRestaurantIdFromName($name);

                        foreach($result as $row){
                            $restaurantId = $row['id'];
                            $restaurantName = $row['name'];
                            $restaurantLocation = $row['location'];
                            $restaurantAddress = $row['address'];
                            $restaurantPrice = $row['price'];
                            $restaurantOpenHours = $row['openHours'];
                            echo "<li class='item'>";
                            echo "<h1>" .$restaurantName."</h1>";
                            echo "<h1>" .$restaurantLocation."</h1>";
                            echo "<h1>" .$restaurantAddress."</h1>";
                            selectAllServicesFromIdRestaurant($restaurantId);
                            echo "<h1>Price: " .$restaurantPrice."</h1>";
                            echo "<h1>Hours: ".$restaurantOpenHours."</h1>";
                            echo "</li>\n";
                        }
                        $result = getRestaurantIdFromCategory($name);
                        foreach($result as $row){
                            $restaurantId = $row['id'];
                            $restaurantName = $row['name'];
                            $restaurantLocation = $row['location'];
                            $restaurantAddress = $row['address'];
                            $restaurantPrice = $row['price'];
                            $restaurantOpenHours = $row['openHours'];
                            echo "<li class='item'>";
                            echo "<h1>" .$restaurantName."</h1>";
                            echo "<h1>" .$restaurantLocation."</h1>";
                            echo "<h1>" .$restaurantAddress."</h1>";
                            selectAllServicesFromIdRestaurant($restaurantId);
                            echo "<h1>Price: " .$restaurantPrice."</h1>";
                            echo "<h1>Hours: ".$restaurantOpenHours."</h1>";
                            echo "</li>\n";
                        }
                    }
                }
                ?>'
                <li class="gap"></li>
            </ul>
        </section> <!-- cd-gallery -->

        <div class="cd-filter">
            <form method="post" action="searchRestaurants.php" class="action-wrapper">

                <div class="cd-filter-block">
                    <h4>Category</h4>

                    <ul class="cd-filter-content cd-filters list">
                        <?php
                        selectAllCategories();
                        ?>
                    </ul> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block">
                    <h4>Cuisine</h4>

                    <ul class="cd-filter-content cd-filters list">
                        <?php
                        selectAllServices();
                        ?>
                    </ul> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->
                <li>
                    <input type="checkbox" name="restaurant" value="porta">Breakfast<br>
                    <input class="button" type="submit" name="submit" value="Search">

                </li>
            </form>

        </div> <!-- cd-filter -->

        <a href="#0" class="cd-filter-trigger">Filters</a>
    </main> <!-- cd-main-content -->

<?php
include_once "footer.php";
?>