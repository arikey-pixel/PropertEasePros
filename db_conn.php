<?php
$servername = "localhost";
$username = "mharis2";
$password = "mharis2";
$dbname = "mharis2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
