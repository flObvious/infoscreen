<?php
$username = "root";
$password = "Welcome123";
$hostname = "localhost";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password)
or die("Unable to connect to MySQL");

mysqli_select_db($dbhandle, "infoscreen");

$title = $_POST['title'];
$img = $_POST['img'];
$text = $_POST['text'];

$sql="INSERT INTO pagecontent (idPageContent, title, img, text, pageFK) VALUES (NULL , '$title', '$img', '$text', 1)";
//$sql="INSERT INTO template (idtemplate, title, image, HTML) VALUES('2','title', 'IMG', 'test2')";

if(mysqli_query($dbhandle, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbhandle);
}

mysqli_close($dbhandle)
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Activity</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <!-- Optional Bootstrap theme -->
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/infoscreen.css">
    </head>
    <body>
        <form method="post" name="generate" action="generate.php" >
            <input type="submit" name="Submit" value="Generate File" />
        </form>

        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/page.js"></script>
    </body>
</html>
