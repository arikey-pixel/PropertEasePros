<?php
$host = "localhost";
$user = "akey8";
$pass = "akey8";
$dbname = "akey8";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $propertyId = $_GET['id'];
    $sql = "SELECT * FROM Property WHERE property_id = $propertyId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $propertyDetails = $result->fetch_assoc();
    } else {
        echo "Property not found.";
    }
} else {
    echo "Invalid request. Property ID is missing.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="property-details.css" type="text/css" rel="stylesheet">
    <title>Property Details</title>
</head>
<body>
    <div class="company-logo">
        <a href="home.html"><img id="logo" src="logo.png" alt="company-logo"></a> 
        <h3>PropertEase Pros</h3>  
    </div>

    <a href="buyer-dashboard.php" id="back-button">Back</a>

    <div class="prop">
        <h1>Property Details</h1>
    </div>
    <div class="prop-details-container">
        <div class="prop-details">
            <?php
            if (isset($propertyDetails)) {
                echo "<p>ID: " . $propertyDetails['property_id'] . "</p>";
                echo "<p>Location: " . $propertyDetails['location'] . "</p>";
                echo "<p>Price: " . $propertyDetails['property_value'] . "</p>";
                echo "<p>Age: " . $propertyDetails['age'] . "</p>";
                echo "<p>Floor-Plan: " . $propertyDetails['floor_plan'] . "</p>";
                echo "<p>Square-Footage: " . $propertyDetails['square_footage'] . "</p>";
                echo "<p>Number of Bedrooms: " . $propertyDetails['num_bedrooms'] . "</p>";
                echo "<p>Number of Bathrooms: " . $propertyDetails['num_bathrooms'] . "</p>";
                echo "<p>Has a Garden: " . $propertyDetails['has_garden'] . "</p>";
                echo "<p>Parking Availability: " . $propertyDetails['parking_availability'] . "</p>";
                echo "<p>Proximity to Towns: " . $propertyDetails['proximity_to_towns'] . "</p>";
                echo "<p>Proximity to Schools: " . $propertyDetails['proximity_to_schools'] . "</p>";
                echo "<p>Proximity to Main Roads: " . $propertyDetails['proximity_to_main_roads'] . "</p>";
                echo "<p>Walkability Score: " . $propertyDetails['walkability_score'] . "</p>";
                echo "<p>Property Tax @ 7%: " . ($propertyDetails['property_value'] * .07) . "</p>";
            }
            ?>
        </div>
        
         
        <div class="property-image">
            <?php
            if (isset($propertyDetails)) {
                echo "<img src='" . $propertyDetails['image_path'] . "' alt='House Image'>";
            }
            ?>
        </div>
    </div>
</body>
</html>