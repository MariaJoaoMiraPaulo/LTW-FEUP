<?php
session_start();
include_once ('reviewsUtils.php');

$rate=0;
$review = $_POST['review'];
$title = $_POST['title'];
$rate = $_POST['rate'];
$user = $_SESSION['login-user'];
$idRest = $_SESSION['restID'];
date_default_timezone_set('UTC');
$currentDate =  date("Y/m/d h:i:s");

if(isset($_POST['rating'])){
    $rate=$_POST['rating'];
}


$idRev = sendReviewToRestaurant($idRest,$user,$title,$rate,$review,$currentDate);
setRating($idRest);


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
        addPhotoToReview($target_file,$idRev,$idRest);
    }
}

header("Location:".$_SERVER['HTTP_REFERER']."");