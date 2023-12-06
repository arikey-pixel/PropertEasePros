<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.html");
    exit;
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="buyer_dash.css">
</head>
<body>
    <header>
        <div class="top-right">
            <?php echo htmlspecialchars($username); ?>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </header>
    <main>
        <h1>Welcome, <?php echo htmlspecialchars($username);?> to the Seller DashBoard!</h1>
        <!-- Additional content for the user's page -->
    </main>
</body>
</html>
