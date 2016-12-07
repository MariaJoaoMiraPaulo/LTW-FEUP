<!DOCTYPE html>
<?php
$title = "Welcome";      // Set the title
include "header.php";
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
include "footer.php";
?>