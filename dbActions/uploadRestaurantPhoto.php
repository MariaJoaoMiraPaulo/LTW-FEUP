<?php
session_start();
session_regenerate_id(true);
include_once ('restaurantUtils.php');

if ($_SESSION['token'] !== $_POST['token']) {
    header('HTTP/1.0 403 Forbidden');
    die();
}
$_SESSION['token'] = generate_random_token();

$id = $_SESSION['restID'];

for ($i = 0; $i < count($_FILES['fileToUpload']['name']); $i++) {
    $j = 0; //Variable for indexing uploaded image
    $target_path = "../assets/"; //Declaring Path for uploaded images
    $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
    $ext = explode('.', basename($_FILES['fileToUpload']['name'][$i])); //explode file name from dot(.)
    $file_extension = end($ext); //store extensions in the variable

    $target_path = $target_path.md5(uniqid()). ".".$ext[count($ext) - 1]; //set the target path with a new name of image
    $j = $j + 1; //increment the number of uploaded images according to the files in array

    if (($_FILES["fileToUpload"]["size"][$i] < 100000) && in_array($file_extension, $validextensions)) {
        $target_file = $target_path.$_FILES["fileToUpload"]["name"][$i];
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i],$target_file);
        uploadPhotoToRestaurant($target_file,$id);
    }
}

if(strpos($_SERVER['HTTP_REFERER'],"addRestaurantPhoto.php"))
    header('Location: ../profile.php');
else header("Location:".$_SERVER['HTTP_REFERER']."");


?>