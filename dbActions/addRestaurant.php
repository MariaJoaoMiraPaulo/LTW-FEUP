<?php

include_once ('config.php');
include_once ('restaurantUtils.php');

$restaurantName = htmlspecialchars($_POST['name']);
$restaurantAddress = htmlspecialchars($_POST['address']);
$restaurantLocation = htmlspecialchars($_POST['location']);
$restaurantWebSite = htmlspecialchars($_POST['website']);
$username = htmlspecialchars($_SESSION['login-user']);
$services = $_POST['services'];
$categories = $_POST['categories'];
$price = htmlspecialchars($_POST['price']);
$number = htmlspecialchars($_POST['number']);
$openHour = htmlspecialchars($_POST['openHour']);
$closeHour = htmlspecialchars($_POST['closeHour']);

$arrayServices=[];
$arrayCategories=[];

if ($_SESSION['csrf'] !== $_POST['csrf']) {
    $_SESSION['ERROR']="ERROR: Request does not appear to be legitimate";
}
else generate_random_token();


if($restaurantName && $restaurantAddress){
    addRestaurantToUser($username,$restaurantName,$restaurantAddress,$restaurantLocation,$restaurantWebSite,$price,$number,$openHour,$closeHour);
} //else echo "You must fill at least name and address field";

$id =  getIdRestaurantByName($restaurantName);

$N = count($services);
for($i=0; $i < $N; $i++) {
    array_push($arrayServices,$services[$i]);
}

foreach ($arrayServices as $service){
    addServicesToRestaurant($id,$service);
}

$C = count($categories);
for($i=0; $i < $C; $i++) {
    array_push($arrayCategories,$categories[$i]);
}

foreach ($arrayCategories as $category){
    addCategoryToRestaurant($id,$category);
}

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

header('Location: ../pages/profile.php');


