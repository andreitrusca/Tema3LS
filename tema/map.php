<!DOCTYPE html>
<html>

    <head>
        <style>
            #map {
                height: 800px;
                width: 100%;
            }
        </style>
    </head>

    <body>
        <h3>My Google Maps Demo</h3>
        <div id="map"></div>
        <script>

            function initMap() {

                var uluru = {
                    lat: 30,
                    lng: 0
                };
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 3,
                    center: uluru
                });
<?php

session_start();

          $conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
          mysqli_select_db($conn, "tema3");

          $sql_read = "SELECT * FROM coord";

          $result = mysqli_query($conn, $sql_read);
          if(! $result )
          {
            die('Could not read data: ' . mysqli_error());
          }

          while($row = mysqli_fetch_array($result)) {
              $id = $row['ID'];
              $lat = $row['Latitudine'];
              $long = $row['Longitudine'];
              $dim = $row['Dimensiune'];
              $color = $row['Culoare'];

              echo "var marker =  new google.maps.Circle({
              strokeColor: '$color',
              strokeOpacity: 0.8,
              strokeWeight: 2,
              fillColor: '$color',
              fillOpacity: 0.35,
              map: map,
              center: { lat: $lat, lng: $long },
              radius: $dim * 10000
            });";
          }

    			?>
            }
			
		


        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByKEo-eVV5YXXbbpGUsL7_Leuxb8c543U&callback=initMap">
        </script>
		<br>Click aici ca sa ajungi inapoi pe pagina de <a href = "home.php" tite = "Home">HOME</a>
    </body>

    </html>
