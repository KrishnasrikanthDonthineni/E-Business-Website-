<?php

$host = "localhost";
$dbUsername = "b_f19_03";
$dbPassword = "gg57u4";
$dbName = "b_f19_03_db";
//create connection
$db = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

}
?>