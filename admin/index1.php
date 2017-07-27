<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 500px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>Google Maps</h3>
    <div id="map">
      

    </div>
    <script>
      function initMap() {
        var del = {lat: 2.383416, lng: 99.148409};
        var sud = {lat: 2.384593, lng: 99.1486045};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: del
        });
        var marker = new google.maps.Marker({
          position: del,
          map: map
        }

        );
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhWnpbXxHuBlIiXPpsmRyCCWbVLEOWqak&callback=initMap">
    </script>
  </body>
</html>
