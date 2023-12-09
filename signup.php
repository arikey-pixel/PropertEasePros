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
        // Hash the password before storing it
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (username, email, password, first_name, last_name, user_type) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        // Store the hashed password instead of the plain one
        $stmt->bind_param("ssssss", $user, $email, $hashed_pass, $firstName, $lastName, $userType);
        $stmt->execute();

        header("Location: login.html");
    } else {
        echo "Passwords do not match.";
    }
}

$conn->close();
?>
