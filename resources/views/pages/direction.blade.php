@extends('layout.web')


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions Service</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 60%;
        margin-top: 100px;
        margin-bottom: 50px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body id="start1">
      <br><br><br><br><br><br><br>
   <center><h1 style="margin-bottom: -80px">Direction</h1></center>
    <div id="floating-panel" style="display: none;">
    <b>Start: </b>
    <select id="start">
      <option value="bahria town lahore"  selected>Chicago</option>
                  <!-- <option value="st louis, mo">St Louis</option>
                  <option value="joplin, mo">Joplin, MO</option>
                  <option value="oklahoma city, ok">Oklahoma City</option>
                  <option value="amarillo, tx">Amarillo</option>
                  <option value="gallup, nm">Gallup, NM</option>
                  <option value="flagstaff, az">Flagstaff, AZ</option>
                  <option value="winona, az">Winona</option>
                  <option value="kingman, az">Kingman</option>
                  <option value="barstow, ca">Barstow</option>
                  <option value="san bernardino, ca">San Bernardino</option>
                  <option value="los angeles, ca">Los Angeles</option> -->
    </select>
    <b>End: </b>
    <select id="end">
      <!-- <option value="chicago">Chicago</option>
      <option value="st louis, mo" >St Louis</option> -->
      <option value="{{ $status }}" selected>Joplin, MO</option>
      <!-- <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option> -->
    </select>
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);
        function onChangeHandler() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
      window.onload = function() {
        onChangeHandler();
      };
       // document.getElementById('start1').addEventListener('mouseover', onChangeHandler);
//document.getElementById('end').addEventListener('mouseover', onChangeHandler);
      }
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUx-lN2Wy6w2C0f2o14A3GgY--AqGiXPc&callback=initMap">
    </script>
  </body>
</html>