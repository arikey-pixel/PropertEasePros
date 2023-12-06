<?php
session_start();
$servername = "localhost";
$username = "mharis2";
$password = "mharis2";
$dbname = "mharis2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $userType = $_POST["user-type"];
    $pass = $_POST["password"];
    $confirm_pass = $_POST["confirm-password"];

    if ($pass === $confirm_pass) {
        $sql = "INSERT INTO user (username, email, password, first_name, last_name, user_type) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $user, $email, $pass, $firstName, $lastName, $userType);
        $stmt->execute();

        header("Location: login.html");
    } else {
        echo "Passwords do not match.";
    }
}

$conn->close();
?>
