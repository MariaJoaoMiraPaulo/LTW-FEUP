<!DOCTYPE html>
<?php
$title = "Welcome";      // Set the title
include "header.php";
?>

<form method="post" action="searchRestaurants.php?go" class="action-wrapper">
    <input class="select-location" type="text" name="search" placeholder="Local..">
    <!-- SELECT DISTINCT category FROM restaurant GROUP BY category ORDER BY COUNT(*) DESC LIMIT 5; -->
    <select class ="select-category">
        <?php
        include_once "searchBar.php";
        ?>
    </select>
    <input class="search-bar" type="text" name="name" placeholder="Restaurante..">
    <input class="button" type="submit" name="submit" value="Search">
</form>

<?php
if(isset($_POST['submit'])){
    if(isset($_GET['go'])){
        if(preg_match ("/[a-zA-Z]/", $_POST['name'])){
            $name=$_POST['name'];
            //connect to the database
            $db = new PDO('sqlite:restaurant.db');
            $stmt = $db->prepare('SELECT id FROM restaurant WHERE name LIKE ?');
            $stmt->execute([$name]);
            $result = $stmt->fetchAll();
            foreach($result as $row){
                $ID=$row['id'];
                $restaurantName = $row['name'];
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
