<script>
    var map, infoWindow;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 41.397,
                lng: 20.644
            },
            zoom: 8
        });
        infoWindow = new google.maps.InfoWindow;
        google.maps.event.addListener(map, 'click', function(event) {
            alert(event.latLng.lat() + ", " + event.latLng.lng());
            var latitude = document.getElementById("latitude");
            latitude.value = event.latLng.lat();

            var longitude = document.getElementById("longitude");
            longitude.value = event.latLng.lng();
        });
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                var latitude = document.getElementById("latitude");
                latitude.value = pos.lat;

                var longitude = document.getElementById("longitude");
                longitude.value = pos.lng;

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                infoWindow.open(map);
                map.setCenter(pos);
                map.setZoom(16)
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1v5pJOvRsS-r-L03ZoPYqCJCwPiLsxPg&callback=initMap"></script>