<!DOCTYPE html>
<?php
$title = "Welcome";      // Set the title
include "header.php";

if(isset($_POST['submit'])){
    if(isset($_GET['go'])){
        if(preg_match("^/[A-Za-z]+/", $_POST['restaurant'])){
            $restaurant=$_POST['restaurant'];
            //connect to the database
            $db = new PDO('sqlite:restaurant.db');
            $sql = 'SELECT id FROM restaurant WHERE name LIKE \'%" . $name .  "%\'';
            $result = sqlite_query($sql);
            while ($row = sqlite_fetch_array($result)) {
                $ID=$result['id'];
                $restaurantName = $result['name'];
                echo "<ul>\n";
                echo "<li>" . "<a  href=\"searchRestaurants.php?id=$ID\">"   .$restaurantName . "</a></li>\n";
                echo "</ul>";
            }
        }
    }
    else{
        echo "<p>Please enter a search query</p>";
    }
}


include "footer.php";
?>
