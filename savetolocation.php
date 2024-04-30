<?php
// Database connection
$servername = "localhost"; // Change this to your MySQL server name if different
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password if set
$dbname = "inventory_system"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the latitude, longitude, and username are set
if (isset($_POST["latitude"]) && isset($_POST["longitude"]) && isset($_POST["username"])) {
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $username = $_POST["username"];

    // Insert data into database
    $sql = "INSERT INTO inventory_system (latitude, longitude, username) VALUES ('$latitude', '$longitude', '$username')";
    if ($conn->query($sql) === TRUE) {
        echo "Location data recorded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Latitude, longitude, or username not set.";
}

// Close connection
$conn->close();
?>
