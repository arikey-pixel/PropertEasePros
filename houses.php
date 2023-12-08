<?php
// Connect to the database (replace these with your database credentials)
$host = "localhost";
$user = "akey8";
$pass = "akey8";
$dbname = "akey8";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all data from the table
$sql = "SELECT * FROM Property";
$result = $conn->query($sql);

// Fetch the data
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$conn->close();

// Output the data as JSON (you can choose a different format if needed)
echo json_encode($data);
?>
