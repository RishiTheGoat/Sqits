<?php
$servername = "localhost";
$username = "schola34_karan";
$password = "Karan123?";
$database = "schola34_karansorey";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>