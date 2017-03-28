<?php
/**
 * Created by PhpStorm.
 * User: stbf
 * Date: 27.03.2017
 * Time: 13:40
 */
$username = "root";
$password = "Welcome123";
$hostname = "localhost";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password)
or die("Unable to connect to MySQL");

mysqli_select_db($dbhandle, "infoscreen");

$id = mysqli_query($dbhandle, 'SELECT COUNT(*) AS NumberOfPageContent FROM pagecontent;');
$newid = mysqli_fetch_array($id, MYSQLI_NUM);

$title = mysqli_query($dbhandle, 'SELECT title FROM pagecontent WHERE idPageContent='.$newid[0].';');
$img = mysqli_query($dbhandle, 'SELECT img FROM pagecontent WHERE idPageContent='.$newid[0].';');
$text = mysqli_query($dbhandle, 'SELECT text FROM pagecontent WHERE idPageContent='.$newid[0].';');

$title = mysqli_fetch_array($title, MYSQLI_NUM);
$img = mysqli_fetch_array($img, MYSQLI_NUM);
$text = mysqli_fetch_array($text, MYSQLI_NUM);

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

mysqli_close($dbhandle);