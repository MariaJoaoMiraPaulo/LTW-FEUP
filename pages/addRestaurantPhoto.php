<?php
include_once "header.php";
$id = $_GET['id'];
?>

<p>Add your first photo to restaurant album...</p>

<form class="addRestaurantForm" action="../dbActions/uploadRestaurantPhoto.php?id=<?echo $id?>" method="post" enctype="multipart/form-data">
    <li>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Restaurant Photo" name="submit">
    </li>
</form>

<?php
include_once "footer.php";
?>
