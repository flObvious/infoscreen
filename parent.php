<?php

$username = "root";
$password = "Welcome123";
$hostname = "localhost";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password)
or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

$selected = mysqli_select_db($dbhandle, "infoscreen")
or die("Could not select examples");

//$result = mysqli_query($dbhandle, 'SELECT HTML FROM template WHERE idtemplate="1"');
//
//$row = mysqli_fetch_array($result, MYSQLI_NUM);
//printf ($row[0]);
$result = mysqli_query($dbhandle, 'SELECT COUNT(*) AS NumberOfPageContent FROM pagecontent;');
$row = mysqli_fetch_array($result, MYSQLI_NUM);
printf ($row[0]);

//if ($handle = opendir('pages')) {
//    while (false !== ($entry = readdir($handle))) {
//        echo "$entry\n";
//    }
//    closedir($handle);
//}
?>
