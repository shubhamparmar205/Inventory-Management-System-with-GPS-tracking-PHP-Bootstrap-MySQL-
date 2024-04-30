<!DOCTYPE html>
<html>
<head>
    <title>Live Location Tracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Live Location Tracker</h1>
        <button class="btn btn-primary" onclick="showLiveLocation()">Show Live Location</button>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function showLiveLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    var username = prompt("Please enter your username:");

                    if (username != null && username.trim() !== "") {

                    fetch('insert_data.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(formData),
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Data inserted successfully:', data);
                    })
                    .catch(error => {
                        console.error('There was a problem inserting data:', error);
                    });
                        // document.cookie = "latitude=" + latitude + "; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/";
                        // document.cookie = "longitude=" + longitude + "; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/";
                        // document.cookie = "username=" + username + "; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/";

                        var googleMapsUrl = "https://www.google.com/maps?q=" + latitude + "," + longitude;
                        window.open(googleMapsUrl, "_blank");
                    } else {
                        alert("Username cannot be empty.");
                    }
                }, function(error) {
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
    <?php
    ?>
</body>
</html>
