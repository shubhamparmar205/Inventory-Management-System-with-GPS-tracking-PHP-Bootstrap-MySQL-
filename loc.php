<!DOCTYPE html>
<html>
<head>
    <title>Live Location Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Live Location Tracker</h1>
        <form id="locationForm">
            <label for="username">Driver name:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username"><br><br>
            <button type="button" onclick="showLiveLocation()">Show Live Location on Google Maps</button>
        </form>
    </div>

    <!-- Your JavaScript code here -->
    <script>
        function showLiveLocation() {
            var username = document.getElementById("username").value.trim();

            if (username === "") {
                alert("Please enter your username.");
                return;
            }

            // Check if geolocation is supported by the browser
            if (navigator.geolocation) {
                // Request the user's current location
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Extract latitude and longitude from the position object
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Construct the Google Maps URL with the live location
                    var googleMapsUrl = "https://www.google.com/maps?q=" + latitude + "," + longitude;

                    // Open a new window redirected to Google Maps
                    window.open(googleMapsUrl, "_blank");

                    // Send data to PHP script for insertion into the database
                    var xhr = new XMLHttpRequest();
                    var formData = new FormData();
                    formData.append('username', username);
                    formData.append('latitude', latitude);
                    formData.append('longitude', longitude);
                    xhr.open('POST', 'insert_location.php', true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            console.log('Data inserted successfully:', xhr.responseText);
                        }
                    };
                    xhr.send(formData);
                }, function(error) {
                    // Handle errors
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            alert("User denied the request for geolocation.");
                            break;
                        case error.POSITION_UNAVAILABLE:
                            alert("Location information is unavailable.");
                            break;
                        case error.TIMEOUT:
                            alert("The request to get user location timed out.");
                            break;
                        case error.UNKNOWN_ERROR:
                            alert("An unknown error occurred.");
                            break;
                    }
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
    </script>
</body>
</html>
