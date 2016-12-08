<?php
session_start();
?>
<!DOCTYPE html>
<?php
$title = "Welcome";
include_once "header.php";
include_once "../dbActions/restaurantUtils.php";
include_once "../dbActions/reviewsUtils.php";
$id = $_GET["id"];
$_SESSION['restID']=$id;
$nameRestaurant = getRestaurantNameById($id);
?>

    <div id="restaurantImage">
        <div class="container">
            <div class="restaurantInfo">
            </div>
            <h1><?php echo $nameRestaurant ?></h1>
        </div>
    </div>

    <form class="reviewForm" action="../dbActions/sendReview.php" method="post">
        Write a review:<br>
        <input type="text" name="title">Title<br>
        <input type="text" name="review">Review<br>
        <input type="text" name="rate">User Rate<br>
        <input type="submit" value="Submit">
    </form>

    <?php getRestaurantReviews($_SESSION['restID'])?>

<?php
include_once "footer.php";
?>