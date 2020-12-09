<?php

$host       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "prescilia";
$dsn        = "mysql:host=$host;dbname=$dbname";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("connection failed:" . misqli_connect_error());
}
?>
