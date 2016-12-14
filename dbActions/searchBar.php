<form method="get" action="searchRestaurants.php" class="action-wrapper">

    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script>
        function writeAddressName(latLng) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                    "location": latLng
                },
                function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK){
                        document.getElementById("addressSearch").placeholder =  results[0].address_components[2].short_name;
                        document.getElementById("addressSearch").value =  results[0].address_components[2].short_name;
                        document.getElementById("address").innerHTML = results[0].address_components[2].short_name;
                    }
                    else
                        document.getElementById("error").innerHTML += "Unable to retrieve your address" + "<br />";
                });
            return results[0].address_components[2].short_name;
        }

        function geolocationSuccess(position) {
            var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            // Write the formatted address
            writeAddressName(userLatLng);

            var myOptions = {
                zoom : 16,
                center : userLatLng,
                mapTypeId : google.maps.MapTypeId.ROADMAP
            };
            // Draw the map
            var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
            // Place the marker
            new google.maps.Marker({
                map: mapObject,
                position: userLatLng
            });
            // Draw a circle around the user position to have an idea of the current localization accuracy
            var circle = new google.maps.Circle({
                center: userLatLng,
                radius: position.coords.accuracy,
                map: mapObject,
                fillColor: '#0000FF',
                fillOpacity: 0.5,
                strokeColor: '#0000FF',
                strokeOpacity: 1.0
            });
            mapObject.fitBounds(circle.getBounds());
        }

        function geolocationError(positionError) {
            document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
        }

        function geolocateUser() {
            // If the browser supports the Geolocation API
            if (navigator.geolocation)
            {
                var positionOptions = {
                    enableHighAccuracy: true,
                    timeout: 10 * 1000 // 10 seconds
                };
                navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
            }
            else
                document.getElementById("error").innerHTML += "Your browser doesn't support the Geolocation API";
        }

        window.onload = geolocateUser;
    </script>
    <style type="text/css">
        #map {
            width: 500px;
            height: 500px;
        }
    </style>
    <input id="addressSearch" class="select-location" type="text" value="" name="location" placeholder="Location">
    <input class="search-bar" type="text" name="restaurant" placeholder="Search for restaurants...">
    <input class="button" type="submit" name="submit" value="Search">
</form>
