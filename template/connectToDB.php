<?php
/**
 * Created by PhpStorm.
 * User: stbf
 * Date: 29.03.2017
 * Time: 13:38
 */

function connectDB()
{
    $username = "root";
    $password = "Welcome123";
    $hostname = "localhost";

//connection to the database
    $dbhandle = mysqli_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");

    mysqli_select_db($dbhandle, "infoscreen");

    return $dbhandle;
}