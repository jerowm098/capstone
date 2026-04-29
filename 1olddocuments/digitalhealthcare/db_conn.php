<?php
$host = "localhost";
$user = "root";
$pass = ""; // Default sa XAMPP ay empty
$dbname = "healthcare_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>