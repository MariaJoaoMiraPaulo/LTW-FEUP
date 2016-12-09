<?php
session_start();
?>
<?php
$title = "Welcome";
include_once "header.php";
include_once "../dbActions/restaurantUtils.php";
include_once "../dbActions/reviewsUtils.php";
$id = $_GET["id"];
$userId = $_SESSION['login-user'];
$_SESSION['restID'] = $id;
$nameRestaurant = getRestaurantNameById($id);
$location = getRestaurantInfoById($id, 'location');
?>
    <script src="../js/slider.js"></script>

    <div class="restaurantPage">
        <div class="main">
            <div class="container">
                <div class="album">
                    <div id="photos">
                        <?php getRestaurantPhotos($id); ?>
                    </div>
                    <a class="arrowLeft" onclick="plusDivs(-1)">&#10094;</a>
                    <a class="arrowRight" onclick="plusDivs(+1)">&#10095;</a>
                </div>
                <p id="restaurantName"><?php echo $nameRestaurant ?></p>
                <p id="restaurantLocation"><?php echo $location ?></p>
            </div>
            <div class="container">
                <div class="editRestaurant">
                    <form class="editRestForm" action="../dbActions/editRestaurant.php" method="post">
                        <fieldset>
                            <label>Address</label>
                            <input type="text" name="restAddress"
                                   value="<?php echo getRestaurantInfoById($id, 'address') ?>"><br>
                            <label>Location</label>
                            <input type="text" name="restLocation"
                                   value="<?php echo getRestaurantInfoById($id, 'location') ?>"><br>
                            <label>WebSite</label>
                            <input type="url" name="restWebSite"
                                   value="<?php echo getRestaurantInfoById($id, 'website') ?>"><br>
                            <label>Cost</label>
                            <input type="text" name="restPrice"
                                   value="<?php echo getRestaurantInfoById($id, 'price') ?>"><br>
                            <?php
                            if (restaurantOwner($_SESSION["restID"], $_SESSION["login-user"]))
                                echo ' <input type="submit" value="Submit">';
                            ?>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="addPhotos">
                <p class="boxTitle">Add photo to your galery:</p>
                <div class="addPhotos">
                    <?php
                    if (restaurantOwner($_SESSION["restID"], $_SESSION['login-user'])) {
                        echo '<form class="addRestaurantPhotoForm" action="../dbActions/uploadRestaurantPhoto.php?" method="post" enctype="multipart/form-data">';
                        echo '<input id="findPhoto" type="file" name="fileToUpload" id="fileToUpload">';
                        echo '<br>';
                        echo '<input type="submit" value="Upload Restaurant Photo" name="submit">';
                        echo '</form>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
            $photo = '../assets/'.getUserPhoto($_SESSION['login-user']);
            ?>
            <img id="userPhoto" src=<?php echo $photo?>>
            <form class="reviewForm" action="../dbActions/sendReview.php" method="post">
                <p class="boxTitle">Write a review:</p>
                <label>Choose a title:</label>
                <input type="text" name="title"><br>
                <label>Write your review:</label>
                <input id="reviewArea" type="text" name="review"><br>
                <div class="rating">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
                <!-- <input type="text" name="rate">User Rate<br>-->
                <input type="submit" value="Publish">
            </form>
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