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
        if(isset($_GET['Path_ID'])){
            $Path_ID = $_GET['Path_ID'];
            $select = "select * from pathes where Path_Id = $Path_ID";
            $query_select = mysqli_query($Database,$select);
            $row = mysqli_fetch_array($query_select);
            $Path_Name = $row['Path_Name'];
            $Latitude_A = $row['Latitude_A'];
            $Longitude_A= $row['Longitude_A'];
            $Latitude_B = $row['Latitude_B'];
            $Longitude_B = $row['Longitude_B'];
            $Path_type = $row['Path_type'];
            $Additional_Information = $row['Additional_Information'];

        }
    ?>
    <center>
    <form method="post">
    <div>
    <h1>Edit Link</h1>
    <br>
    <label>Link_Name</label>
    <br><br>
    <input  type="text" placeholder="Path_Name"name="Path_Name" value="<?php echo $row["Path_Name"]?>"><br><br>
    <label>Substation_A</label>
    <br><br>
    <select name="Substation_A" required>
                <option value="<?php echo $row["Substation_A"]?>"><?php echo $row["Substation_A"]?></option>
                <?PHP
                $query2 ="SELECT Marker_Name FROM marker";
                $result2 = mysqli_query($Database,$query2);
                while ($data2 = mysqli_fetch_assoc($result2)) {
                  echo ' <option>'.$data2['Marker_Name'].'</option> ';}?>
    </select>
    <br><br>
    <label>Substation_B</label>
    <br><br>
    <select name="Substation_B" required>
                <option value="<?php echo $row["Substation_B"]?>"><?php echo $row["Substation_B"]?></option>
                <?PHP
                $query2 ="SELECT Marker_Name FROM marker";
                $result2 = mysqli_query($Database,$query2);
                while ($data2 = mysqli_fetch_assoc($result2)) {
                  echo ' <option>'.$data2['Marker_Name'].'</option> ';}?>
    </select>
    <br><br>
    <label>Link_Type</label>
    <br><br>
    <select  name="Path_type"  style="width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;">
    <option><?php echo $row["Path_type"]?></option>
    <option value="Red">Red OTN 10G</option>
    <option value="Yellow">Yellow OTN 1G</option>
    <option value="Blue">Blue Coriant 10G</option>
    <option value="Green">Green Coriant 1G</option>
    </select>
    <br><br> <label>More_Information</label><br><br>
    <input  type="text" placeholder="More_Information"name="Additional_Information"value="<?php echo $row["Additional_Information"]?>"><br><br>
    <br><br>
    <input type="submit"name="Edit_Path"value="Edit Link">
    <br><br><br>
    </div>
    <br>
    <br>
    <?php
     $Path_ID=$_GET['Path_ID'];
    ?>
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
if(isset($_POST['Edit_Path'])){
    $Path_Name = trim(strip_tags($_POST['Path_Name']));
    $Path_type = trim(strip_tags($_POST['Path_type']));
    $Additional_Information = trim(strip_tags($_POST['Additional_Information']));
    $update ="Update pathes set Path_Name ='$Path_Name',Latitude_A='$Latitude_A',Longitude_A='$Longitude_A',Latitude_B='$Latitude_B',Longitude_B='$Longitude_B',Path_type='$Path_type',Substation_A = '$Substation_A',Substation_B = '$Substation_B',Additional_Information='$Additional_Information' where Path_Id = '$Path_ID'";
    $query_update = mysqli_query($Database,$update);
    echo '<meta http-equiv="refresh" content="0;Map.php">';
}
         if(isset($_POST['Back'])){
        echo '<meta http-equiv="refresh" content="0;Map.php">';}
?>