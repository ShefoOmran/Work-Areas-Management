<!DOCTYPE html>
<head>
    <style>
        input ,select
        {
            font-size: 20px;
            color:black;
            font-weight: bold;
            margin-right:25px;
            width:300px;
            height: 35px;
        }
        label
        {
            margin-right: 20px;
            font-size: 25px;
            color:black;
            font-weight: bold;
        }
        div
        {
            background-color: beige;
            width: 900px;
            margin-top: 25px;
            padding-top: 25px;
        }
        td,th
        {
            width:130px;
            height:30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
        $Database = mysqli_connect($host,$user,$passpass,$databasename);
        if(isset($_GET['Marker_Name'])){
            $Marker_Name = $_GET['Marker_Name'];
        }
        if(isset($_GET['lat'])){
            $lat = $_GET['lat'];
        }
        if(isset($_GET['lng'])){
            $lng = $_GET['lng'];
        }
    ?>
    <center>
    <form method="post">

    <div>
    <h1>Add Substation </h1>
    <br><br>
    <label>Substation_Name</label>
    <br><br>
    <input  type="text" placeholder="Marker_Name"name="Marker_Name" value="<?php echo $Marker_Name?>"required><br><br>
    <label>Longitude</label>
    <br><br>
    <input  type="text" placeholder="Latitude"name="Latitude"value="<?php echo $lat?>"required><br><br>
    <label>Longitude</label>
    <br><br>
    <input  type="text" placeholder="Longitude"name="Longitude"value="<?php echo $lng?>"required><br><br>
    <label>Installation_Date</label>
    <br><br>
    <input  type="Date" placeholder="Installation_Date"name="Installation_Date"required><br><br>
    <label>Comissioning_Date</label>
    <br><br>
    <input  type="Date" placeholder="Comissioning_Date"name="Comissioning_Date"required>

    <br><br>
    <input type="submit"name="Add_Marker"value="Add Substation">
    <br><br><br>
    </div>
    <br>
    <br>
    <label>All Substations</label>
    <br>
    <br>
    <script src="js/jquery-1.10.2.js"></script>
    <table style="font-size: 1.1rem">
    <tr>
        <th style="border: 1px solid #e9ecef">ID</th>
        <th style="border: 1px solid #e9ecef">Name</th>
        <th style="border: 1px solid #e9ecef" >Latitude</th>
        <th style="border: 1px solid #e9ecef">Longitude</th>
        <th style="border: 1px solid #e9ecef">Installation_Date</th>
        <th style="border: 1px solid #e9ecef">Comissioning_Date	</th>
        <th style="border: 1px solid #e9ecef">Delete</th>
        <th style="border: 1px solid #e9ecef">Edit</th>
    </tr>
    <?php
     $n=$_GET['Marker_Name'];
     $select = "select * from marker;";
     $query_select = mysqli_query($Database,$select);
     $count = mysqli_num_rows($query_select);
     while($row = mysqli_fetch_array($query_select)){
    ?>
    <tr>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Marker_Id"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Marker_Name"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Latitude"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Longitude"]?></td>  
        <td style="border: 1px solid #e9ecef"><?php echo $row["Installation_Date"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Comissioning_Date"]?></td>
        <td style="border: 1px solid #e9ecef"><center> <a style="font-weight:bold;text-decoration:none" name="Edit"href="Delete_Marker.php?Marker_Name=<?php echo $n?>&ID=<?php echo $row["Marker_Id"]?>&lat=<?php echo $lat?>&lng=<?php echo $lng?>">Delete</center></td> 
        <td style="border: 1px solid #e9ecef"><center> <a style="font-weight:bold;text-decoration:none" name="Edit"href="Edit_Marker.php?Marker_Name=<?php echo $n?>&ID=<?php echo $row["Marker_Id"]?>&lat=<?php echo $lat?>&lng=<?php echo $lng?>">Edit</center></td> 
    </tr>
    <?php
}
?>

<?php
if($count ==0){
$ID_Increment = "ALTER TABLE marker AUTO_INCREMENT = 1";
$query_A_I = mysqli_query($Database,$ID_Increment);
}
?>
    </table>
    </form>
    <br><br>
        <form method="post">
    <input type="submit"name="Add_Serivces"value="Add Services">
    <input type="submit"name="Add_Equipment"value="Add Nodes">
    <input type="submit"name="Add_Pathes"value="Add Links">
         <input type="submit" name="Back" value="Back To Map"style="
        font-size: 20px;
        color: black;
        font-weight: bold;
        width: 250px;
        height: 40px;
        margin-bottom:70px;
        cursor:pointer;
        float:right;
        background-color:rgb(185, 169, 143)">
    </form>
    </center>
</body>
</html>
<?php

if(isset($_POST['Add_Marker'])){
    $Marker_Name = trim(strip_tags($_POST['Marker_Name']));
    $lat = trim(strip_tags($_POST['Latitude']));
    $lng = trim(strip_tags($_POST['Longitude']));
    $Installation_Date = trim(strip_tags($_POST['Installation_Date']));
    $Comissioning_Date = trim(strip_tags($_POST['Comissioning_Date']));
    //$No_equipment = trim(strip_tags($_POST['No_equipment']));
    $insert ="insert into marker(Marker_Name,Latitude,Longitude,Installation_Date,Comissioning_Date) Values('$Marker_Name','$lat','$lng','$Installation_Date','$Comissioning_Date')";
    $query_insert = mysqli_query($Database,$insert);
   echo '<meta http-equiv="refresh" content="0;Map.php">';
}
if(isset($_POST['Add_Equipment'])){
    echo '<meta http-equiv="refresh" content="0;MoreInfo.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
    if(isset($_POST['Add_Pathes'])){
        echo '<meta http-equiv="refresh" content="0;Pathes.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
        if(isset($_POST['Add_Serivces'])){
            echo '<meta http-equiv="refresh" content="0;Services.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
                     if(isset($_POST['Back'])){
        echo '<meta http-equiv="refresh" content="0;Map.php">';}
?>