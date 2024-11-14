<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog"; // Replace with your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
