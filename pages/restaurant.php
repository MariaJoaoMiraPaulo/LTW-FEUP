<?php
session_start();
?>
<!DOCTYPE html>
<?php
$title = "Welcome";
include_once "header.php";
include_once "../dbActions/restaurantUtils.php";
$id = $_GET["id"];
$nameRestaurant = getRestaurantNameById($id);
?>


<?php
include_once "footer.php";
?>