<?php
// $host = "localhost";
// $user = "root";
// $password = "";
// $database = "student_portal";

$host = "localhost";
$user = "np03cs4s250102";
$password = "4pOTFRQ1f3";
$database = "np03cs4s250102";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>