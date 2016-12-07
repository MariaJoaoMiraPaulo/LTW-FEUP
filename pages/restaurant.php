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

<form class="cd-form floating-labels">
    <fieldset>
        <legend>Write a review</legend>
        <div class="icon">
            <label class="cd-label" for="cd-textarea">Write a review</label>
            <textarea class="message" name="cd-textarea" id="cd-textarea" required></textarea>
        </div>

        <div>
            <input type="submit" value="Send">
        </div>
    </fieldset>
</form>

<?php
include_once "footer.php";
?>