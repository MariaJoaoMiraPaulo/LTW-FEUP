<?php

$id_autor=$_GET['id'];
$idRev=$_GET['idRev'];

echo $id_autor;
echo $idRev.'<br>';

$name = "answer".$idRev;

$text = $_POST[$name];

echo $text;

date_default_timezone_set('UTC');
$currentDate =  date("Y/m/d h:i:s");

//addCommentToReview($review_id,$id_autor,$text,$currentDate);