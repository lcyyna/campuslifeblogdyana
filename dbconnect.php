<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "dd";
$conn = new mysqli($host, $user, $password, $database);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>