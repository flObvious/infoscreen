<?php
/**
 * Created by PhpStorm.
 * User: stbf
 * Date: 27.03.2017
 * Time: 13:40
 */
include 'connectToDB.php';

//select newest id
$id = mysqli_query(connectDB(), 'SELECT (idPlaceholder) FROM placeholder ORDER BY idPlaceholder DESC LIMIT 1;');
$newid = mysqli_fetch_array($id, MYSQLI_NUM);

//select content
$title = mysqli_query(connectDB(), 'SELECT title FROM placeholder WHERE idPlaceholder='.$newid[0].';');
$img = mysqli_query(connectDB(), 'SELECT img FROM placeholder WHERE idPlaceholder='.$newid[0].';');
$text = mysqli_query(connectDB(), 'SELECT text FROM placeholder WHERE idPlaceholder='.$newid[0].';');

//convert sql query result to array
$title = mysqli_fetch_array($title, MYSQLI_NUM);
$img = mysqli_fetch_array($img, MYSQLI_NUM);
$text = mysqli_fetch_array($text, MYSQLI_NUM);

echo "<strong>inserted file with </strong><br />";
echo "<strong>title: </strong>".$title[0]."<br />";
echo "<strong>img: </strong>".$img[0]."<br />";
echo "<strong>text: </strong>".$text[0];

//replace with placeholders --> dev placeholders
$titlePlaceholder = "<!--Title-->";
$imgPlaceholder = "<!--img-->";
$textPlaceholder = "<!--Text-->";

//read the entire string
$str=file_get_contents('templatefile/activity.html');

//replace something in the file string
$str=str_replace("$titlePlaceholder", "$title[0]",$str);
$str=str_replace("$imgPlaceholder", "$img[0]",$str);
$str=str_replace("$textPlaceholder", "$text[0]",$str);

//write the entire string
file_put_contents('show/activity.html', $str);

mysqli_close(connectDB());