<?php

include_once('user.php');
include_once('config.php');
include_once('restaurantUtils.php');

function sendReviewToRestaurant($idRest, $user, $title, $userRate, $text, $date)
{
    $id_autor = getIdByUserName($user);
    $likes = 0;

    global $db;

    $statement = $db->prepare('INSERT INTO reviews (restaurant_id, id_autor,title,userRate,text,date,likes) VALUES (?,?,?,?,?,?,?);SELECT SCOPE_IDENTITY() as id; RETURN;');

    if ($result = $statement->execute([$idRest, $id_autor, $title, $userRate, $text, $date, $likes])) {
        $idRev = $db->lastInsertId();
        return $idRev;
    }
    return false;
}

function addPhotoToReview($name, $idRev, $idRest)
{
    global $db;
    $statement1 = $db->prepare('INSERT INTO reviewPhoto (name, restaurant_id,review_id) VALUES (?,?,?)');
    $statement1->execute([$name, $idRest, $idRev]);
    return true;
}

function getRestaurantReviews($idRest, $idUser)
{

    global $db;
    $statement = $db->prepare('SELECT * FROM reviews WHERE restaurant_id = ? ');
    $statement->execute([$idRest]);

    while ($row = $statement->fetch()) {
        $id = $row['id_autor'];
        $idRev = $row['id'];
        $userName = getUserNameById($id);
        $photoUser = "../assets/" . getUserPhoto($userName);
        $fullName = getUserInfoByUserName($userName, 'fullName');
        $userRate = $row['userRate'];
        $review = $row['text'];

        $html = '<img id="userPhotoReview" src=' . $photoUser . '>';

        echo '<div class="reviewContainer">';
        echo $html;
        echo '<p>' . $fullName . '</p>';
        echo '<p>' . $userName . '</p>';
        echo '<p>' . $review . '</p>';
        echo '<p>' . $row['title'] . '</p>';


        printStarsRating($userRate);


        echo '<div class="containerUserPhotos">';
        getReviewPhotos($idRev);
        echo '</div>';
        echo '<p>' . $row['date'] . '</p>';
        echo '</div>';

        getAllCommentsOfReview($idRev);

        if (restaurantOwner($idRest, $idUser)) {
            echo '<br>';
            $button = "buttonAnswer" . $idRev;
            $name = "answer" . $idRev;
            $form = "form" . $idRev;

            echo '<br>' . '<button class="buttonAnswer" id=' . $button . ' onclick=openAnswerForm("' . $idRev . '");>Answer</button>';
            echo '<form id=' . $form . ' action="../dbActions/reviewAnswer.php?id=' . $id . '&idRev=' . $idRev . '" hidden="hidden" method="post">';
            echo '<input class="answerReviewTextArea" type="search" name=' . $name . '><br>';
            echo '<input class="buttonReviewAnswer" type="submit" value="Submit">';
            echo '</form>';
        }


    }
    return true;
}

function addCommentToReview($idRev, $id_autor, $text, $currentDate)
{
    $likes = 0;

    global $db;

    $statement = $db->prepare('INSERT INTO comments (review_id,id_autor,text,"date",likes) VALUES (?,?,?,?,?)');

    if ($statement->execute([$idRev, $id_autor, $text, $currentDate, $likes])) {
        return true;
    }
    return false;
}

function getAllCommentsOfReview($idRev)
{
    global $db;

    $statement = $db->prepare('SELECT * FROM comments WHERE review_id = ? ');
    $statement->execute([$idRev]);

    while ($row = $statement->fetch()) {
        echo '<p>' . $row['text'] . '</p>';
        echo '<p>' . $row['date'] . '</p>';
    }

    return true;
}

function getAllRelatedPhotos($idRest)
{
    global $db;
    $statement = $db->prepare('SELECT * FROM reviewPhoto WHERE restaurant_id = ? ');
    $statement->execute([$idRest]);

    while ($row = $statement->fetch()) {
        $photoDir = $row['name'];
        echo "<div class='flexContainer'>";
        echo "<img src='$photoDir'>";
        echo "</div>";
    }

    return true;
}

function getReviewPhotos($idRev)
{
    global $db;
    $statement = $db->prepare('SELECT * FROM reviewPhoto WHERE review_id = ? ');
    $statement->execute([$idRev]);

    while ($row = $statement->fetch()) {
        $photoDir = $row['name'];
        echo "<img class='reviewPhoto' src=$photoDir>";
    }

    return true;
}