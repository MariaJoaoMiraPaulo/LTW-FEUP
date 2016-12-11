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
    $location = getRestaurantInfoById($id, 'location');
    ?>
    <div class="searchBarContainer">
        <?php
        include "../dbActions/searchBar.php";
        ?>
    </div>

    <script src="../js/slider.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/review.js"></script>
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
                <p class="boxTitle">Add a photo to your galery:</p>
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
            <form id="formRev" class="reviewForm" action="../dbActions/sendReview.php" method="post" nctype="multipart/form-data">
                <p class="boxTitle">Write a review:</p>
                <label>Choose a title:</label>
                <input type="text" name="title"><br>
                <label>Write your review:</label>
                <input id="reviewArea" type="text" name="review"><br>

                <fieldset class="rating">
                    <input class="stars" type="radio" id="star5" name="rating5" value="5" />
                    <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input class="stars" type="radio" id="star4" name="rating4" value="4" />
                    <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input class="stars" type="radio" id="star3" name="rating3" value="3" />
                    <label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input class="stars" type="radio" id="star2" name="rating2" value="2" />
                    <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input class="stars" type="radio" id="star1" name="rating1" value="1" />
                    <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                </fieldset>

                <br><br>

                <input type="file" name="fileToUpload" id="fileToUpload">

                <br><br>
                <input id="submit" type="submit" value="Publish">
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
            <div class="flexPhotos">
                <?php
                getAllRelatedPhotos($_SESSION['restID']);
                ?>
            </div>

        </div>
    </div>

    </div>


<?php
include_once "footer.php";
?>