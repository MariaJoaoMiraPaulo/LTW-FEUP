<?php
session_start();
?>
    <!DOCTYPE html>
    <?php

    include_once "header.php";
    include_once "../dbActions/restaurantUtils.php";
    include_once "../dbActions/reviewsUtils.php";
    if (isset($_POST['submit'])) {
        if (preg_match("/[a-zA-Z]/", $_POST['restaurant'])) {
            $name = $_POST['restaurant'];
            $location = $_POST['location'];
            $result = getRestaurantFromName($name);
        }
    }
    $title = $name;
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
                foreach ($result as $row) {
                    echo "<div class=\"container\">";
                    $restaurantName = $row['name'];
                    $id=getIdRestaurantByName($restaurantName);
                    echo "<h1 onclick=\"location.href='restaurant.php?id=$id';\">" . $restaurantName . "</h1>";
                    echo "</div>";
                }
                $result = getRestaurantIdFromCategory($name);
                foreach ($result as $row) {
                    echo "<div class=\"container\">";
                    $restaurantName = $row['name'];
                    $id=getIdRestaurantByName($restaurantName);
                    echo "<h1 onclick=\"location.href='restaurant.php?id=$id';\">" . $restaurantName . "</h1>";
                    echo "</div>";
                }
                ?>

        </div>
    </div>


<?php
include_once "footer.php";
?>