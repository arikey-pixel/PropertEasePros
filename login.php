<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    // Modified SQL to fetch user_type along with other details
    $sql = "SELECT id, username, password, user_type FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $stored_pass, $userType);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if ($pass === $stored_pass) {
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            $_SESSION["user_type"] = $userType; // Store user type in session

            // Redirect based on user type
            if ($userType === 'buyer') {
                header("Location: buyer-dashboard.php");
            } else if ($userType === 'seller') {
                header("Location: seller_dash.php");
            } else {
                // Handle unexpected user type
                header("Location: login.html?error=invalidusertype");
            }
            exit;
        } else {
            header("Location: login.html?error=incorrectpassword");
            exit();
        }
    } else {
        header("Location: login.html?error=usernotfound");
        exit();
    }
}

$conn->close();
?>
