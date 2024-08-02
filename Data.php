<!DOCTYPE html>
<html>
<?php
      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
      $Database = mysqli_connect($host,$user,$passpass,$databasename);
      $select = "select * from marker";
      $query_select = mysqli_query($Database,$select);
      $count = mysqli_num_rows($query_select);
      $select2 = "SELECT * FROM pathes";
      $query_select2 = mysqli_query($Database, $select2);
      $count2 = mysqli_num_rows($query_select2);
      $select3 = "SELECT * FROM equipment";
      $query_select3 = mysqli_query($Database, $select3);
      $count3 = mysqli_num_rows($query_select3);
      $select4 = "SELECT * FROM services";
      $query_select4 = mysqli_query($Database, $select4);
      $count4 = mysqli_num_rows($query_select4);
?>
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
        height: 100%;
        width: 100%;
    }

    .logo-overlay {
        position: absolute;
        top: 10px;
        left: 200px;
        width: 100px;
        height: 60px;
        z-index: 100;
    }

    .counters {
        position: absolute;
        right: 1200px;
        bottom: 80px;
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

    <script>
    var customIcon = {
        url: 'Network_Diagram_Symbols_MPLSTP.png',
        scaledSize: new google.maps.Size(30, 30)
    };

   function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 26.44091, lng: 50.07485},
        zoom: 7,
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
      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
      $Database = mysqli_connect($host,$user,$passpass,$databasename);
      $select = "select * from marker;";
      $query_select = mysqli_query($Database,$select);
      $count = mysqli_num_rows($query_select);
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
      echo "<a href=\"Info2.php?Marker_Name=$name\"style=\"margin-right:10px;color:Blue\">More Info</a>";
      echo "</div>';";
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

      $select2 = "SELECT * FROM pathes WHERE Substation_A IS NOT NULL OR  Substation_B IS NOT NULL";
      $query_select2 = mysqli_query($Database, $select2);
      $count2 = mysqli_num_rows($query_select2);
      
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
    }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6kGEV_3fNUrSygbyyAOeKC8fDyG0CrYU&callback=initMap">
    </script>
</body>

</html>

<!DOCTYPE html>

<head>
    <style>
    input {
        font-size: 20px;
        color: black;
        font-weight: bold;
        margin-right: 25px;
        width: 300px;
        height: 35px;
        margin-top: 50px;
    }

    label {
        font-size: 25px;
        color: black;
        font-weight: bold;
    }

    td,
    th {
        width: 150px;
        height: 30px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div id="mapContainer">
        <div id="map">NG MPLS-TP Telecom Network (EOA)</div>
        <img src="IMG.png"class="logo-overlay"> 
        <h2 style="position: absolute;top: 7px;left: 350px; width: 500px;height: 100px;z-index: 100;">NG MPLS-TP Telecom Network (EOA)</h2>
    </div>
    <div class="counters">
        <p>Substation : <span id="markerCount"><?php echo $count ;?>
            </span></p>
        <p>Links : <span id="pathCount"><?php echo $count2 ;?></span></p>
        <p>Nodes : <span id="pathCount"><?php echo $count3;?></span></p>
        <p>Services : <span id="pathCount"><?php echo $count4;?></span></p>
    </div>
    <center>
    <br>
        <form method="post">
            <label>All Information</label>
            <br><br>
            <input type="submit" name="Markers" value="About All Substation ">
            <input type="submit" name="Pathes" value="About All Links">
            <input type="submit" name="Equipments" value="About All Nodes">
            <input type="submit" name="Services" value="About All Services">
        </form>
    </center>
</body>
<?php
      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
    $Database = mysqli_connect($host,$user,$passpass,$databasename);
    $select = "select * from marker;";
     $query_select = mysqli_query($Database,$select);
    if(isset($_POST['Markers']))
    {
        echo '
        <br><br>
        <br>
        <center>
        <table style="font-size: 1.1rem;">
    <tr>
        <th style="border: 1px solid #e9ecef">ID</th>
        <th style="border: 1px solid #e9ecef">Name</th>
        <th style="border: 1px solid #e9ecef" >Latitude</th>
        <th style="border: 1px solid #e9ecef">Longitude</th>
        <th style="border: 1px solid #e9ecef">Installation_Date</th>
        <th style="border: 1px solid #e9ecef">Comissioning_Date	</th>
    </tr>
    ';
    while($row = mysqli_fetch_array($query_select)){
     ?>
<tr>
    <td style="border: 1px solid #e9ecef">Substation - <?php echo $row["Marker_Id"]?></td>
    <td style="border: 1px solid #e9ecef"><?php echo $row["Marker_Name"]?></td>
    <td style="border: 1px solid #e9ecef"><?php echo $row["Latitude"]?></td>
    <td style="border: 1px solid #e9ecef"><?php echo $row["Longitude"]?></td>
    <td style="border: 1px solid #e9ecef"><?php echo $row["Installation_Date"]?></td>
    <td style="border: 1px solid #e9ecef"><?php echo $row["Comissioning_Date"]?></td>
</tr>
<?php
    }}
    ?>
<?php
    $select = "select * from equipment;";
     $query_select = mysqli_query($Database,$select);
    if(isset($_POST['Equipments']))
    {
        echo '
        <br><br>
        <br>
        <center>
        <table style="font-size: 1.1rem">
    <tr>
    <th style="border: 1px solid #e9ecef">ID</th>
    <th style="border: 1px solid #e9ecef">Name</th>
    <th style="border: 1px solid #e9ecef">Type</th>
    <th style="border: 1px solid #e9ecef">Station</th>
    <th style="border: 1px solid #e9ecef">Slot_1</th>
    <th style="border: 1px solid #e9ecef">Slot_2</th>
    <th style="border: 1px solid #e9ecef">Slot_3</th>
    <th style="border: 1px solid #e9ecef">Slot_4</th>
    <th style="border: 1px solid #e9ecef">Slot_5</th>
    <th style="border: 1px solid #e9ecef">Slot_6</th>
    <th style="border: 1px solid #e9ecef">Slot_7</th>
    <th style="border: 1px solid #e9ecef">Slot_8</th>
    <th style="border: 1px solid #e9ecef">Slot_9</th>
    <th style="border: 1px solid #e9ecef">Slot_10</th>
    <th style="border: 1px solid #e9ecef">Slot_11</th>
    <th style="border: 1px solid #e9ecef">Slot_12</th>
    <th style="border: 1px solid #e9ecef">Slot_13</th>
    <th style="border: 1px solid #e9ecef">Slot_14</th>
    <th style="border: 1px solid #e9ecef">Slot_15</th>
    </tr>
    ';
    while($row = mysqli_fetch_array($query_select)){
     ?>
<tr>
<td style="border: 1px solid #e9ecef;font-size: 16px;"><?php echo $row["Equipment_Id"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Equipment_Name"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Equipment_type"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Substation_Name"]?></td>    
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_1"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_2"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_3"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_4"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_5"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_6"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_7"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_8"]?></td>   
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_9"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_10"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_11"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_12"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_13"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_14"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_15"]?></td>   
</tr>
<?php
}}
?>
<?php
$in = 0;
    $select = "select * from pathes";
     $query_select = mysqli_query($Database,$select);
    if(isset($_POST['Pathes']))
    {
        echo '
        <br><br>
        <br>
        <center>
        <table style="font-size: 1.1rem">
    <tr>
    <th style="border: 1px solid #e9ecef">ID</th>
    <th style="border: 1px solid #e9ecef">Name</th>
    <th style="border: 1px solid #e9ecef">Substation_A</th>
    <th style="border: 1px solid #e9ecef">Substation_B</th>
    <th style="border: 1px solid #e9ecef">Link_Type</th>
    <th style="border: 1px solid #e9ecef">Additional_Information</th>
    </tr>
    ';
    while($row = mysqli_fetch_array($query_select)){
         if($row["Path_type"] == "Red")
     {
         $x= "OTN 10G ";
     }
     else if($row["Path_type"] == "Yellow")
     {
         $x= "OTN 1G ";
     }
     else if($row["Path_type"] == "Blue")
     {
         $x= "Coriant 10G ";
     }
     else if($row["Path_type"] == "Green")
     {
         $x= "Coriant 1G ";
     }
     ?>
<tr>
    <td style="border: 1px solid #e9ecef">Link - <?php echo $row["Path_Id"]?></td>
    <td style="border: 1px solid #e9ecef"><?php echo $row["Path_Name"]?></td>
    <td style="border: 1px solid #e9ecef"><?php echo $row["Substation_A"]?></td>
    <td style="border: 1px solid #e9ecef"><?php echo $row["Substation_B"]?></td>
    <td style="border: 1px solid #e9ecef"><?php echo $x . "( " . " " .  $row["Path_type"] . " )"?></td>
    <td style="border: 1px solid #e9ecef"><?php echo $row["Additional_Information"]?></td>
</tr>
<?php
$in+=1;}}
?>


<?php
    $select = "select * from services;";
     $query_select = mysqli_query($Database,$select);
    if(isset($_POST['Services']))
    {
        echo '
        <br><br>
        <br>
        <center>
        <table style="font-size: 1.1rem">
    <tr>
        <th style="border: 1px solid #e9ecef">ID</th>
        <th style="border: 1px solid #e9ecef">Station</th>
        <th style="border: 1px solid #e9ecef">Node_Type</th>
        <th style="border: 1px solid #e9ecef">Slot_Name</th>
        <th style="border: 1px solid #e9ecef">Port_1</th>
        <th style="border: 1px solid #e9ecef">Port_2</th>
        <th style="border: 1px solid #e9ecef">Port_3</th>
        <th style="border: 1px solid #e9ecef">Port_4</th>
        <th style="border: 1px solid #e9ecef">Port_5</th>
        <th style="border: 1px solid #e9ecef">Port_6</th>
        <th style="border: 1px solid #e9ecef">Port_7</th>
        <th style="border: 1px solid #e9ecef">Port_8</th>
        <th style="border: 1px solid #e9ecef">Port_9</th>
        <th style="border: 1px solid #e9ecef">Port_10</th>
        <th style="border: 1px solid #e9ecef">Port_11</th>
        <th style="border: 1px solid #e9ecef">Port_12</th>
        <th style="border: 1px solid #e9ecef">Port_13</th>
        <th style="border: 1px solid #e9ecef">Port_14</th>
        <th style="border: 1px solid #e9ecef">Port_15</th>
        <th style="border: 1px solid #e9ecef">Port_16</th>
    </tr>
    ';
    while($row = mysqli_fetch_array($query_select)){
     ?>
<tr>
        <td style="border: 1px solid #e9ecef;font-size: 13px;">S - <?php echo $row["Service_ID"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Substation_Name"]?></td>  
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Equipment_Type"]?></td>  
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Slot_Name"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_1"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_2"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_3"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_4"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_5"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_6"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_7"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_8"]?></td>   
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_9"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_10"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_11"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_12"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_13"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_14"]?></td>
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_15"]?></td>   
        <td style="border: 1px solid #e9ecef;font-size: 13px;"><?php echo $row["Port_16"]?></td> 
</tr>
<?php
}}
?>