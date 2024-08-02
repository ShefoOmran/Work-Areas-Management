<?php
    $ID=$_GET['ID'];
    $n=$_GET['Marker_Name'];
    $lat=$_GET['lat'];
    $lng=$_GET['lng'];
      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
    $Database = mysqli_connect($host,$user,$passpass,$databasename);

    if(isset($_GET['ID']))
    {
        $select = "select * from marker where Marker_Id =$ID;";
        $query_select = mysqli_query($Database,$select);
        $row = mysqli_fetch_array($query_select);
        $Marker_Name = $row['Marker_Name'];
        $Latitude = $row['Latitude'];
        $Longitude = $row['Longitude'];
        $Installation_Date = $row['Installation_Date'];
        $Comissioning_Date = $row['Comissioning_Date'];
        //$No_equipment = $row['No_equipment'];
    }
    ?>
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
    <center>
    <form method="post">
    <div>
    <label>Edit Substation </label>
    <br><br><br>
    <label>Substation_Name</label>
    <br><br>
    <input  type="text" placeholder="Marker_Name"name="Marker_Name" value="<?php echo $Marker_Name;?>" ><br><br>
    <label>Longitude</label>
    <br><br>
    <input  type="text" placeholder="Latitude"name="Latitude"value="<?php echo $Latitude;?>"><br><br>
    <label>Longitude</label>
    <br><br>
    <input  type="text" placeholder="Longitude"name="Longitude"value="<?php echo $Longitude;?>"><br><br>
    <label>Installation_Date</label>
    <br><br>
    <input  type="Date" placeholder="Installation_Date"name="Installation_Date"value="<?php echo $Installation_Date;?>"><br><br>
    <label>Comissioning_Date</label>
    <br><br>
    <input  type="Date" placeholder="Comissioning_Date"name="Comissioning_Date"value="<?php echo $Comissioning_Date;?>">
    <br><br>
    <input type="submit"name="Edit_Marker"value="Edit Substation">
    <br><br><br>
    </div>
    <br>
    <br>
    <script src="js/jquery-1.10.2.js"></script>
    </table>
    </form>
    <form method = "post">
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
// if(isset($_POST['equipment']))
// {
//     $equipment = trim(strip_tags($_POST['equipment']));
//     $query7 ="SELECT Equipment_Id  FROM equipment where Equipment_type = '$equipment'";
//     $result7 = mysqli_query($Database,$query7);
//     while ($data7 = mysqli_fetch_assoc($result7)) 
//     {
//     $No_equipment =  $data7["Equipment_Id"];
//     }
// }
if(isset($_POST['Edit_Marker'])){
    $Marker_Name = trim(strip_tags($_POST['Marker_Name']));
    $lat = trim(strip_tags($_POST['Latitude']));
    $lng = trim(strip_tags($_POST['Longitude']));
    $Installation_Date = trim(strip_tags($_POST['Installation_Date']));
    $Comissioning_Date = trim(strip_tags($_POST['Comissioning_Date']));
    //$No_equipment = trim(strip_tags($_POST['No_equipment']));
    $update ="Update marker set Marker_Name ='$Marker_Name',Latitude='$lat',Longitude='$lng',Installation_Date='$Installation_Date',Comissioning_Date='$Comissioning_Date' where Marker_Id = '$ID'";
    $query_insert = mysqli_query($Database,$update);
   echo '<meta http-equiv="refresh" content="0;Map.php">';
}
         if(isset($_POST['Back'])){
        echo '<meta http-equiv="refresh" content="0;Map.php">';}
?>