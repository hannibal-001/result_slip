<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$db = "kca_results";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
