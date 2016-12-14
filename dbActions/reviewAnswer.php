<?php

include_once "reviewsUtils.php";



$id_autor=htmlspecialchars($_GET['id']);
$idRev=htmlspecialchars($_GET['idRev']);
$name = "answer".$idRev;
$text =htmlspecialchars($_POST[$name]);

date_default_timezone_set('UTC');
$currentDate =  date("Y/m/d h:i:s");

addCommentToReview($idRev,$id_autor,$text,$currentDate);

header("Location:".$_SERVER['HTTP_REFERER']."");