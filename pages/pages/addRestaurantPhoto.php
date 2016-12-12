<?php
include_once "header.php";
$id = $_GET['id'];
$_SESSION['restID'] = $id;
?>

<p>Add your first photo to restaurant album...</p>

<form class="addRestaurantForm" action="../dbActions/uploadRestaurantPhoto.php?" method="post" enctype="multipart/form-data">
    <li>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Restaurant Photo" name="submit">
    </li>

    <button type="button" onclick="window.location.href='profile.php'" >Not Yet!</button>
</form>

<?php
include_once "footer.php";
?>
