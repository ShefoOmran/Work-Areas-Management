<?php
      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
      $Database = mysqli_connect($host,$user,$passpass,$databasename);
      $select = "select * from marker";
      $query_select = mysqli_query($Database,$select);
      $count = mysqli_num_rows($query_select);
      $select2 = "SELECT * FROM pathes WHERE Substation_A IS NOT NULL OR Substation_B IS NOT NULL";
      $query_select2 = mysqli_query($Database, $select2);
      $count2 = mysqli_num_rows($query_select2);
      $select3 = "SELECT * FROM equipment";
      $query_select3 = mysqli_query($Database, $select3);
      $count3 = mysqli_num_rows($query_select3);
      $select4 = "SELECT * FROM services";
      $query_select4 = mysqli_query($Database, $select4);
      $count4 = mysqli_num_rows($query_select4);
?>

<!DOCTYPE html>
<html>

<head>
    <title>MPLS-TP Telecom Network Map</title>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6kGEV_3fNUrSygbyyAOeKC8fDyG0CrYU&libraries=geometry">
    </script>
    <style>
    #mapContainer {
        position: relative;
        height: 570px;
        width: 100%;
    }

    #map {
        height: 98%;
        width: 100%;
    }

    .logo-overlay {
        position: absolute;
        top: 10px;
        left: 200px;
        width: 100px;
        height: 50px;
        z-index: 100;
    }

    .counters {
        position: absolute;
        right: 1200px;
        bottom: 50px;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 5px 10px;
        border-radius: 5px;
        width:100px;
    }

    /* Style for marker info window */
    .info-window {
        width: 200px;
    }

    a {
        text-decoration: none;
        font-size: 18px;
        color: red;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div id="mapContainer">
        <div id="map">NG MPLS-TP Telecom Network Map</div>
        <img src="IMG.png"class="logo-overlay"> 
        <h2 style="position: absolute;top: 7px;left: 350px; width: 450px;height: 100px;z-index: 100;">NG MPLS-TP Telecom Network (EOA)</h2>
    </div>
    <div class="counters">
        <p>Substation : <span id="markerCount"><?php echo $count ;?>
            </span></p>
        <p>Links : <span id="pathCount"><?php echo $count2 ;?></span></p>
        <p>Nodes : <span id="pathCount"><?php echo $count3;?></span></p>
        <p>Services : <span id="pathCount"><?php echo $count4;?></span></p>
    </div>
    <button id="addCustomMarkerButton">Add Substation </button>
    <input id="latitudeInput" type="text" placeholder="Latitude">
    <input id="longitudeInput" type="text" placeholder="Longitude">
    <input id="markerNameInput" type="text" placeholder="Marker Name">
    <script>
    var map;
    var markers = [];
    var paths = [];

    var customIcon = {
        url: 'Network_Diagram_Symbols_MPLSTP.png',
        scaledSize: new google.maps.Size(30, 30)
    };

   function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 26.44091, lng: 50.07485},
        zoom: 6,
        mapTypeId: 'satellite', // Set the map type to satellite
        styles: [
          {
            featureType: 'poi',
            elementType: 'labels',
            stylers: [{visibility: 'off'}]
          },
          {
            featureType: 'transit',
            elementType: 'labels',
            stylers: [{visibility: 'off'}]
          }
          // Add more styles to turn off labels for other map features if needed
        ]
        });
        var infoWindows = [];
        var m = [];
        <?php
        $index = 0;
        $names=[];
while($row = mysqli_fetch_array($query_select)) {
        $latitude = $row["Latitude"];
        $longitude = $row["Longitude"];
        $name = $row["Marker_Name"];
        echo "var marker2 = new google.maps.Marker({";
        echo "position: { lat: $latitude, lng: $longitude },";
        echo "map: map,";
        echo "icon: customIcon,";
        echo "title: '$name'";
        echo "});";
        echo "var content = '<div class=\"info-window\">";
        echo "<p>Name: $name</p>";
        echo "<p>Latitude: $latitude</p>";
        echo "<p>Longitude: $longitude</p><center>";
        echo "<a href=\"Info.php?Marker_Name=$name\"style=\"margin-right:10px;color:Blue\">More Info</a>";
        echo "<a href=\"MoreInfo.php?Marker_Name=$name&lat=$latitude&lng=$longitude\">Add Info</a>";
        echo "</center></div>';";
        echo "var infoWindow = new google.maps.InfoWindow({";
        echo "content: content,";
        echo "maxWidth: 400,";
        echo "});";
        echo "infoWindows.push(infoWindow);"; 
        echo "m.push(marker2);"; 
        echo "m[$index].addListener('click', function() {infoWindows[$index].open(map,m[$index])});";
        $names[$index]=$name;
        $index++;
        }
      
      while ($row2 = mysqli_fetch_assoc($query_select2)) 
        {
          $Latitude_A = $row2['Latitude_A'];
          $Longitude_A = $row2['Longitude_A'];
          $Latitude_B = $row2['Latitude_B'];
          $Longitude_B = $row2['Longitude_B'];
          $color=$row2['Path_type'];
      
          echo "var coordinates = [
              {lat: $Latitude_A, lng: $Longitude_A},
              {lat: $Latitude_B, lng: $Longitude_B}
          ];";
      
          echo "var flightPath = new google.maps.Polyline({
              path: coordinates,
              geodesic: true,
              strokeColor: '$color',
              strokeOpacity: 2.0,
              strokeWeight: 3
          });";
      
          echo "flightPath.setMap(map);"; 
        }
          ?>
        document.getElementById('addCustomMarkerButton').addEventListener('click', function() {
            var latitude = parseFloat(document.getElementById('latitudeInput').value);
            var longitude = parseFloat(document.getElementById('longitudeInput').value);
            var markerName = document.getElementById('markerNameInput').value;

            if (!isNaN(latitude) && !isNaN(longitude) && markerName) {
                var position = new google.maps.LatLng(latitude, longitude);
                addMarker(position, markerName);
            } else {
                alert('Invalid input. Please enter valid latitude, longitude, and marker name.');
            }
        });

        function addMarker(position, name) {
            var marker = new google.maps.Marker({
                position: position,
                map: map,
                title: name,
                icon: customIcon,
            });

            markers.push(marker);
            updateMarkerCounter();

            var infoWindow = new google.maps.InfoWindow({
                content: '<div class="info-window">' +
                    '<p>Name: ' + name + '</p>' +
                    '<p>Latitude: ' + position.lat() + '</p>' +
                    '<p>Longitude: ' + position.lng() + '</p>' +
                    '<button onclick="deleteMarker(' + (markers.length - 1) + ')">Delete Marker</button>' +
                    '<a href="Markers.php?Marker_Name=' + name + '&lat=' + position.lat() + '&lng=' + position
                    .lng() + '">' + 'More Info' + '</a>' +
                    '</div>',
                maxWidth: 400,
            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });

            // Populate marker selection dropdowns
            var optionA = document.createElement('option');
            optionA.value = name;
            optionA.text = name;
            document.getElementById('markerSelectA').appendChild(optionA);

            var optionB = document.createElement('option');
            optionB.value = name;
            optionB.text = name;
            document.getElementById('markerSelectB').appendChild(optionB);
        }

        function updateMarkerCounter() {
            var markerCountElement = document.getElementById('markerCount');
            markerCountElement.textContent = markers.length;
        }

        // Create path functionality
        document.getElementById('createPathButton').addEventListener('click', function() {
            var markerTitleA = document.getElementById('markerSelectA').value;
            var markerTitleB = document.getElementById('markerSelectB').value;
            var selectedColor = document.getElementById('pathColorSelect').value;

            var markerA = markers.find(function(marker) {
                return marker.getTitle() === markerTitleA;
            });

            var markerB = markers.find(function(marker) {
                return marker.getTitle() === markerTitleB;
            });

            if (markerA && markerB) {
                createConnectivityPath([markerA, markerB], selectedColor);
            } else {
                alert('Please select two markers from the dropdowns.');
            }
        });

        function createConnectivityPath(selectedMarkers, color) {
            var pathPoints = selectedMarkers.map(function(marker) {
                return marker.getPosition();
            });

            var pathTitle = 'From: ' + selectedMarkers[0].getTitle() + ' to: ' + selectedMarkers[1].getTitle();

            var connectivityPath = new google.maps.Polyline({
                path: pathPoints,
                geodesic: true,
                strokeColor: color,
                strokeOpacity: 1.0,
                strokeWeight: 2,
                map: map,
            });
            paths.push(connectivityPath);
            updatePathCounter();


            // var infoWindow5 = new google.maps.InfoWindow({
            //     content: '<div class="info-window">' +
            //         '<p>Name: ' + pathTitle + '</p>' +
            //         '<a href="Pathes.php?Path_Name=' + pathTitle + '">' + 'More Info' + '</a>' +
            //         '</div>',
            //     maxWidth: 400,
            // });

            // connectivityPath.addListener('click', function() {
            //     infoWindow5.open(map, connectivityPath);
            // });



        }

        function updatePathCounter() {
            var pathCountElement = document.getElementById('pathCount');
            pathCountElement.textContent = paths.length;
        }

        window.deleteMarker = function(index) {
            markers[index].setMap(null);
            markers.splice(index, 1);
            updateMarkerCounter();
        }
    }
    </script>


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6kGEV_3fNUrSygbyyAOeKC8fDyG0CrYU&callback=initMap">
    </script>
    <br><br>

</body>

</html>