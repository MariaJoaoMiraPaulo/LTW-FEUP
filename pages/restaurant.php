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
    $userId = $_SESSION['login-user'];
    $_SESSION['restID'] = $id;
    $nameRestaurant = getRestaurantNameById($id);
    ?>

    <div class="restaurantPage">
        <div class="main">
            <div class="container">
                <div class="album">
                    <img class="mySlides" src="../assets/url.jpg">
                </div>

                <h1><?php echo $nameRestaurant ?></h1>
                <div class="addPhotos">
                    <?php
                    echo "Fotos Album" . '<br>';
                    getRestaurantPhotos($id);

                    if (restaurantOwner($_SESSION["restID"], $_SESSION['login-user'])) {
                        echo '<form class="addRestaurantForm" action="../dbActions/uploadRestaurantPhoto.php?" method="post" enctype="multipart/form-data">';
                        echo '<li>';
                        echo '<input type="file" name="fileToUpload" id="fileToUpload">';
                        echo '<input type="submit" value="Upload Restaurant Photo" name="submit">';
                        echo '</li>';
                        echo '</form>';
                    }
                    ?>
                </div>

            </div>
            <div class="container">
                <div class="editRestaurant">
                    <form class="formEditRestaurant" action="../dbActions/editRestaurant.php" method="post">
                        <fieldset>
                            <input type="text" name="restName" value="<?php echo $nameRestaurant ?>"><br>
                            <input type="text" name="restAddress"
                                   value="<?php echo getRestaurantInfoById($id, 'address') ?>"><br>
                            <input type="text" name="restLocation"
                                   value="<?php echo getRestaurantInfoById($id, 'location') ?>"><br>
                            <input type="url" name="restWebSite"
                                   value="<?php echo getRestaurantInfoById($id, 'website') ?>"><br>
                            <input type="text" name="restPrice"
                                   value="<?php echo getRestaurantInfoById($id, 'price') ?>"><br>
                            <input type="text" name="restRating" value="FALTA RATING"><br>
                            <input type="time" name="restHours" value="FALTA HOURS"><br>
                            <?php
                            if (restaurantOwner($_SESSION["restID"], $_SESSION["login-user"]))
                                echo ' <input type="submit" value="Submit">';
                            ?>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="container">

                <div class="reviewsForm">
                    <form class="reviewForm" action="../dbActions/sendReview.php" method="post">
                        Write a review:<br>
                        <input type="text" name="title">Title<br>
                        <input type="text" name="review">Review<br>
                        <input type="text" name="rate">User Rate<br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="reviews">
                    <?php
                    getRestaurantReviews($_SESSION['restID'], $userId);
                    ?>
                </div>
            </div>
        </div>

        <div class="related">
            <div class="container">
                <div class="reviewsForm">
                    <form class="reviewForm" action="../dbActions/sendReview.php" method="post">
                        Write a review:<br>
                        <input type="text" name="title">Title<br>
                        <input type="text" name="review">Review<br>
                        <input type="text" name="rate">User Rate<br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>

    </div>


<?php
include_once "footer.php";
?>