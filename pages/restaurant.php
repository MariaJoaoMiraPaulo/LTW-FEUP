<?php
session_start();
?>
    <!DOCTYPE html>
    <?php
    $title = "Welcome";
    include_once "header.php";
    include_once "../dbActions/restaurantUtils.php";
    include_once "../dbActions/reviewsUtils.php";
    $_SESSION['token'] = generate_random_token();
    $id = $_GET["id"];
    $userId = $_SESSION['login-user'];
    $_SESSION['restID'] = $id;
    $nameRestaurant = getRestaurantNameById($id);
    $location = getRestaurantInfoById($id, 'location');
    $rating = getRestaurantInfoById($_SESSION["restID"], 'rating');
    ?>
    <div class="searchBarContainer">
        <?php
        include "../dbActions/searchBar.php";
        ?>
    </div>

    <script src="../js/slider.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/slider.js"></script>


    <div class="restaurantPage">
        <div class="main">
            <div class="container">
                <div class="album">
                    <div id="photos">
                        <?php $var = getRestaurantPhotos($id);
                        echo '</div>';
                        if ($var) {
                            echo '<a class="arrowLeft" onclick="plusDivs(-1)">&#10094;</a>';
                            echo '<a class="arrowRight" onclick="plusDivs(+1)">&#10095;</a>';
                        }
                        ?>
                    </div>
                    <?php printStarsRating($rating)?>
                    <p id="restaurantName"><?php echo $nameRestaurant ?></p>
                    <p id="restaurantLocation"><?php echo $location ?></p>
                </div>


                <div class="container">
                    <div class="editRestaurant">
                        <?php
                        if (restaurantOwner($_SESSION["restID"], $_SESSION["login-user"])) {
                            echo '<form class="editRestForm" action="../dbActions/editRestaurant.php" method="post">';
                            echo '<input type="hidden" name="token" value="' . $_SESSION['token'] . '">';
                            echo '<fieldset>';
                            echo '<label>Address</label>';
                            echo '<input type="text" name="restAddress" value="' . getRestaurantInfoById($_SESSION["restID"], 'address') . '"">';
                            echo '<br>';
                            echo '<label>Location</label>';
                            echo ' <input type="text" name="restLocation" value="' . getRestaurantInfoById($_SESSION["restID"], 'location') . '">';
                            echo '<br>';
                            echo '<label>Phone Number</label>';
                            echo ' <input type="number" name="number" value="' . getRestaurantInfoById($_SESSION["restID"], 'phoneNumber') . '">';
                            echo '<br>';
                            echo '<label>WebSite</label>';
                            echo ' <input type="url" name="restWebSite" value="' . getRestaurantInfoById($_SESSION["restID"], 'website') . '">';
                            echo '<br>';
                            echo '<label>Cost</label>';
                            echo ' <input type="text" name="restPrice" value="' . getRestaurantInfoById($_SESSION["restID"], 'price') . '">';
                            echo '<input type="submit" value="Submit">';
                            echo '</fieldset>';
                            echo ' </form>';
                        } else {
                            echo '<label>' . getRestaurantInfoById($_SESSION["restID"], 'address') . '</label>';
                            echo '<br>';
                            echo '</br>';
                            echo '<label>' . getRestaurantInfoById($_SESSION["restID"], 'location') . '</label>';
                            echo '<br>';
                            echo '</br>';
                            echo '<label>' . getRestaurantInfoById($_SESSION["restID"], 'website') . '</label>';
                            echo '<br>';
                            echo '</br>';
                            echo '<label>' . getRestaurantInfoById($_SESSION["restID"], 'price') . '</label>';
                            echo '<br>';
                            echo '</br>';
                            echo '<label>' . getRestaurantInfoById($_SESSION["restID"], 'phoneNumber') . '</label>';
                        }
                        ?>

                    </div>
                </div>

                <?php
                if (restaurantOwner($_SESSION["restID"], $_SESSION["login-user"])) {
                    echo '<div class="container">';
                    echo '<div class="addPhotos">';
                    echo '<p class="boxTitle">Add a photo to your galery:</p>';
                    echo '<div class="addPhotos">';
                    echo '<form class="addRestaurantPhotoForm" action="../dbActions/uploadRestaurantPhoto.php?" method="post" enctype="multipart/form-data">';
                    echo '<input id="findPhoto" type="file" name="fileToUpload[]" id="fileToUpload" multiple="multiple">';
                    echo '<br>';
                    echo '<input type="submit" value="Upload Restaurant Photo" name="submit">';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>

                <div class="container">
                    <iframe id="map" frameborder="0"
                            src="https://www.google.com/maps/embed/v1/place?q=<?php echo getRestaurantInfoById($id, 'address'); ?>&key=AIzaSyDimmPV0QbEGkv-JRiam6HfdatZriwafgM"
                            allowfullscreen></iframe>
                </div>

                <div class="container">
                    <?php
                    $photo = '../assets/' . getUserPhoto($_SESSION['login-user']);
                    ?>
                    <img id="userPhoto" src=<?php echo $photo ?>>
                    <form id="formRev" class="reviewForm" action="../dbActions/sendReview.php" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>"/>
                        <p class="boxTitle">Write a review:</p>
                        <label>Choose a title:</label>
                        <input type="text" name="title"><br>
                        <label>Write your review:</label>
                        ​<textarea name="review" id="review" rows="10" cols="70"></textarea>

                        <fieldset class="ratingSearch">
                            <input type="radio" id="star5" name="rating" value="5"/><label class="full" for="star5"
                                                                                           title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4"/><label class="full" for="star4"
                                                                                           title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3"/><label class="full" for="star3"
                                                                                           title="Meh - 3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2"/><label class="full" for="star2"
                                                                                           title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1"/><label class="full" for="star1"
                                                                                           title="Sucks big time - 1 star"></label>
                        </fieldset>

                        <br><br>

                        <input type="file" name="fileToUpload[]" id="fileToUpload" multiple="multiple">

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