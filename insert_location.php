<?php
// Database connection parameters
$servername = "localhost"; // Your MySQL server name
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "inventory_system"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the POST request
$username = $_POST['username'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$googleMapsUrl = "https://www.google.com/maps?q=" . $latitude . "," . $longitude;

// Prepare and execute SQL statement to insert data into the 'locations' table
$sql = "INSERT INTO locations (latitude, longitude,username,link) VALUES ('$latitude', '$longitude','$username', '$googleMapsUrl')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
