<?php

$host = "localhost"; // Server host
$user = "root"; // MySQL username
$pass = ""; // MySQL password (leave blank if none)
$db = "ronald_db"; // Database name

// Create connection

$conn = new mysqli($host, $user, $pass, $db);

// Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

?>