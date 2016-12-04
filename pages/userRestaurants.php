<?php
include_once ('../dbActions/restaurantUtils.php');
include_once "header.php";




    getUserRestaurants($_SESSION['login-user']);


include_once "footer.php";
?>