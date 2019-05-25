<?php

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "database";


$mysqli = new mysqli("localhost","root","password","database");
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
