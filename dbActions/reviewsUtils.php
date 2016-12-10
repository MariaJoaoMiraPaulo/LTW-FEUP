<?php

include_once('user.php');
include_once('config.php');
include_once('restaurantUtils.php');

function sendReviewToRestaurant($idRest, $user, $title, $userRate, $text, $date)
{
    $id_autor = getIdByUserName($user);
    $likes = 0;

    global $db;

    $statement = $db->prepare('INSERT INTO reviews (restaurant_id, id_autor,title,userRate,text,date,likes) VALUES (?,?,?,?,?,?,?)');

    if ($statement->execute([$idRest, $id_autor, $title, $userRate, $text, $date,$likes])) {
        return true;
    }
    return false;
}

function getRestaurantReviews($idRest,$idUser){

    global $db;
    $statement = $db->prepare('SELECT * FROM reviews WHERE restaurant_id = ? ');
    $statement->execute([$idRest]);

    while ($row = $statement->fetch()) {
        $id = $row['id_autor'];
        $userName = getUserNameById($id);
        $photoUser = "../assets/".getUserPhoto($userName);
        $fullName = getUserInfoByUserName($userName,'fullName');

        $html = '<img id="userPhotoReview" src=' . $photoUser .'>';

        echo '<div class="reviewContainer">';
        echo $html;
        echo '<p>'.$userName.'</p>';
        echo '<p>'.$fullName.'</p>';
        echo '<p>'. $row['title'] .'</p>';
        echo '<p>'. $row['userRate'] .'</p>';
        echo '<p>'. $row['date'] .'</p>';
        echo '</div>';
        if(restaurantOwner($idRest,$idUser))
            echo '<br>'.'<a href="answerReview.php">Responder</a>'.'<br>';

    }
    return true;
}