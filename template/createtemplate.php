<?php
/**
 * Created by PhpStorm.
 * User: stbf
 * Date: 28.03.2017
 * Time: 10:46
 */

include 'connectToDB.php';

$html = $_POST['text'];

mysqli_query(connectDB(), "INSERT INTO template (idTemplate, HTML) VALUES (NULL, '$html')");

//select newest id
$id = mysqli_query(connectDB(), 'SELECT (idTemplate) FROM template ORDER BY idTemplate DESC LIMIT 1;');
$newid = mysqli_fetch_array($id, MYSQLI_NUM);

$template = mysqli_query(connectDB(), 'SELECT HTML FROM template WHERE idTemplate='.$newid[0].';');
$content = mysqli_fetch_array($template, MYSQLI_NUM);

$fp = fopen("templatefile/template".$newid[0].".html","w");
fwrite($fp,$content[0]);
fclose($fp);

mysqli_close(connectDB());