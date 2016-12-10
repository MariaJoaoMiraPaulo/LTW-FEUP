<?php

$id_autor=$_GET['id'];
echo $id_autor;
$text=$_POST['answer'];
echo $text;

date_default_timezone_set('UTC');
$currentDate =  date("Y/m/d h:i:s");


//addCommentToReview($review_id,$id_autor,$text,$currentDate);