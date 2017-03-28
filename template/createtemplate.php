<?php
/**
 * Created by PhpStorm.
 * User: stbf
 * Date: 28.03.2017
 * Time: 10:46
 */

$username = "root";
$password = "Welcome123";
$hostname = "localhost";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password)
or die("Unable to connect to MySQL");

mysqli_select_db($dbhandle, "infoscreen");

$template = mysqli_query($dbhandle, 'SELECT HTML FROM template WHERE idTemplate=1');
$content = mysqli_fetch_array($template, MYSQLI_NUM);

$fp = fopen("templatefile/activity1.html","w");
fwrite($fp,$content[0]);
fclose($fp);