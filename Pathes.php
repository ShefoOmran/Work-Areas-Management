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
            width:150px;
            height:30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        $n=$_GET['Marker_Name'];
        $lat=$_GET['lat'];
        $lng=$_GET['lng'];
      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
        $Database = mysqli_connect($host,$user,$passpass,$databasename);

    ?>
    <center>
    <form method="post">
        <br><br>
    <div>
    <h1>Add Link</h1>
    <br>
    <label>Link_Name</label>
    <br><br>
    <input  type="text" placeholder="Path_Name"name="Path_Name"required><br><br>
    <label>Substation_A</label>
    <br><br>
    <select name="Substation_A" required>
                <option></option>
                <?php
                $query2 ="SELECT Marker_Name FROM marker";
                $result2 = mysqli_query($Database,$query2);
                while ($data2 = mysqli_fetch_assoc($result2)) {
                  echo ' <option>'.$data2['Marker_Name'].'</option> ';}?>
    </select>
    <br><br>
    <label>Substation_B</label>
    <br><br>
    <select name="Substation_B" required>
                <option></option>
                <?PHP
                $query2 ="SELECT Marker_Name FROM marker";
                $result2 = mysqli_query($Database,$query2);
                while ($data2 = mysqli_fetch_assoc($result2)) {
                  echo ' <option>'.$data2['Marker_Name'].'</option> ';}?>
    </select>
    <br><br>
    <label>Link_Type</label>
    <br><br>
    <select  name="Path_type"  style="width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;"required>
    <option></option>
    <option value="Red">Red OTN 10G</option>
    <option value="Yellow">Yellow OTN 1G</option>
    <option value="Blue">Blue Coriant 10G</option>
    <option value="Green">Green Coriant 1G</option>
    </select>
    <br><br>   
    <label>More_Information</label><br><br>
    <input  type="text" placeholder="More_Information"name="Additional_Information"><br><br>
    <br><br>
    <input type="submit"name="Add_Path"value="Add Link">
    <br><br><br>
    </div>
    <br>
    <br>
    <label>All Links</label>
    <br>
    <br>
    <script src="js/jquery-1.10.2.js"></script>
    <table style="font-size: 1.1rem">
    <tr>
    <th style="border: 1px solid #e9ecef">ID</th>
    <th style="border: 1px solid #e9ecef">Name</th>
    <th style="border: 1px solid #e9ecef">Substation_A</th>
    <th style="border: 1px solid #e9ecef">Substation_B</th>
    <th style="border: 1px solid #e9ecef">Link_Type</th>
    <th style="border: 1px solid #e9ecef">More_Information</th>
    <th style="border: 1px solid #e9ecef">Delete</th>
    <th style="border: 1px solid #e9ecef">Edit</th>
    </tr>
    <?php
     $select = "select * from pathes ";
     $query_select = mysqli_query($Database,$select);
     $count = mysqli_num_rows($query_select);
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
        <td style="border: 1px solid #e9ecef"><?php echo $row["Path_Name"]?> </td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Substation_A"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Substation_B"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $x . "( " . " " .  $row["Path_type"] . " )"?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Additional_Information"]?></td> 
        <td style="border: 1px solid #e9ecef"><center> <a style="font-weight:bold;text-decoration:none" name="Edit"href="Delete_Pathes.php?Path_ID=<?php echo $row["Path_Id"]?>">Delete</center></td> 
        <td style="border: 1px solid #e9ecef"><center> <a style="font-weight:bold;text-decoration:none" name="Edit"href="Edit_Pathes.php?Path_ID=<?php echo $row["Path_Id"]?>">Edit</center></td> 
    </tr>
    <?php
}
?>

<?php
if($count ==0){
$ID_Increment = "ALTER TABLE pathes AUTO_INCREMENT = 1";
$query_A_I = mysqli_query($Database,$ID_Increment);
}
?>
    </table>
    </form>
    <br>
    <br>
    <form method="post">
    <input type="submit"name="Add_Serivces"value="Add Services">
    <input type="submit"name="Add_Markers"value="Add Substations">
    <input type="submit"name="Add_Equipment"value="Add Nodes">
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
if(isset($_POST['Substation_A']))
{
    $Substation_A = trim(strip_tags($_POST['Substation_A']));
    $query5 ="SELECT * FROM marker where Marker_Name = '$Substation_A'";
    $result5 = mysqli_query($Database,$query5);
    while ($data5 = mysqli_fetch_assoc($result5)) 
    {
    $Latitude_A =  $data5['Latitude'];
    $Longitude_A = $data5['Longitude'];
    }
}
if(isset($_POST['Substation_B']))
{
    $Substation_B = trim(strip_tags($_POST['Substation_B']));
    $query7 ="SELECT * FROM marker where Marker_Name = '$Substation_B'";
    $result7 = mysqli_query($Database,$query7);
    while ($data7 = mysqli_fetch_assoc($result7)) 
    {
    $Latitude_B =  $data7["Latitude"];
    $Longitude_B = $data7["Longitude"];
    }
}
if(isset($_POST['Add_Path'])){
    $Path_Name = trim(strip_tags($_POST['Path_Name']));
    $Path_type = trim(strip_tags($_POST['Path_type']));
    $Additional_Information = trim(strip_tags($_POST['Additional_Information']));
    $insert ="insert into pathes(Path_Name,Latitude_A,Longitude_A,Latitude_B,Longitude_B,Path_type,Substation_A,Substation_B,Additional_Information) Values('$Path_Name','$Latitude_A','$Longitude_A','$Latitude_B','$Longitude_B','$Path_type','$Substation_A','$Substation_B','$Additional_Information')";
    $query_insert = mysqli_query($Database,$insert);
    echo '<meta http-equiv="refresh" content="0;Map.php">';
}
if(isset($_POST['Add_Markers'])){
    echo '<meta http-equiv="refresh" content="0;Markers.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
    if(isset($_POST['Add_Equipment'])){
        echo '<meta http-equiv="refresh" content="0;MoreInfo.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
        if(isset($_POST['Add_Serivces'])){
            echo '<meta http-equiv="refresh" content="0;Services.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
                     if(isset($_POST['Back'])){
        echo '<meta http-equiv="refresh" content="0;Map.php">';}
?>