<?php
$title = "Restaurants";      // Set the title

include_once('../dbActions/restaurantUtils.php');
include "header.php";
?>
    <!DOCTYPE html>


    <main class="cd-main-content">
        <div class="cd-tab-filter-wrapper">
            <div class="cd-tab-filter">
                <form method="post" action="searchRestaurants.php" class="action-wrapper">
                    <input class="select-location" type="text" name="search" placeholder="Location">
                    <input class="search-bar" type="text" name="restaurant" placeholder="Search for restaurants or cuisines...">
                    <input class="button" type="submit" name="submit" value="Search">
                </form>
            </div> <!-- cd-tab-filter -->
        </div> <!-- cd-tab-filter-wrapper -->

        <section class="cd-gallery">
            <ul>
                <?php
                if(isset($_POST['submit'])) {
                    if (preg_match("/[a-zA-Z]/", $_POST['restaurant'])) {
                        $name = $_POST['restaurant'];
                        $result = getRestaurantIdFromName($name);
                        foreach($result as $row){
                            $restaurantName = $row['name'];
                            echo "<li class='item'>";
                            echo "<h1>" .$restaurantName."</h1>";

                            echo "</li>\n";
                        }
                        $result = getRestaurantIdFromCategory($name);
                        foreach($result as $row){
                            $restaurantName = $row['name'];
                            echo "<li>"   .$restaurantName . "</a></li>\n";
                        }
                    }
                }
                ?>
                <li class="gap"></li>
            </ul>
        </section> <!-- cd-gallery -->

        <div class="cd-filter">
            <form>

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

            </form>

        </div> <!-- cd-filter -->

        <a href="#0" class="cd-filter-trigger">Filters</a>
    </main> <!-- cd-main-content -->

<?php
include "footer.php";
?>