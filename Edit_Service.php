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
     if(isset($_GET['ID'])){
        $select = "select * from services where Service_ID =$ID;";
        $query_select = mysqli_query($Database,$select);
        $row = mysqli_fetch_array($query_select);
        $Substation_ID = $row['Substation_ID'];
        $Equipment_ID = $row['Equipment_ID'];



        $select2 = "select Marker_Name  from marker where Marker_Id = '$Substation_ID'";
        $query_select2 = mysqli_query($Database,$select2);
        $row2 = mysqli_fetch_array($query_select2);
        $MarkerName = $row2['Marker_Name'];
        $select3 = "select Equipment_Name  from equipment where Equipment_Id ='$Equipment_ID'";
        $query_select3 = mysqli_query($Database,$select3);
        $row3 = mysqli_fetch_array($query_select3);
        $NodeName = $row3['Equipment_Name'];






        $Slot_Name = $row['Slot_Name'];
        $Port_1 = $row['Port_1'];
        $Port_2 = $row['Port_2'];
        $Port_3 = $row['Port_3'];
        $Port_4 = $row['Port_4'];
        $Port_5 = $row['Port_5'];
        $Port_6 = $row['Port_6'];
        $Port_7 = $row['Port_7'];
        $Port_8 = $row['Port_8'];
        $Port_9 = $row['Port_9'];
        $Port_10 = $row['Port_10'];
        $Port_11 = $row['Port_11'];
        $Port_12 = $row['Port_12'];
        $Port_13 = $row['Port_13'];
        $Port_14 = $row['Port_14'];
        $Port_15 = $row['Port_15'];
        $Port_16 = $row['Port_16'];
      }
    ?>
<!DOCTYPE html>
<head>
    <style>
        input
        {
            font-size: 20px;
            color:black;
            font-weight: bold;
            margin-right:25px;
            margin-bottom:15px;
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
            width:95px;
            height:30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
    <form method="post">
    <div>
    <h1>Edit Service</h1>
    <br>
    <label>Substation</label><br><br>
    <select name="Substation_Name"style="width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;" required>
    <option value = "<?php echo $Substation_ID;?>"><?php echo $MarkerName;?></option>
    <?php 
        $host = 'sql309.infinityfree.com';
        $user='if0_35028557';
        $passpass='KwI7f3dRthY';
        $databasename = 'if0_35028557_map';
         $Database = mysqli_connect($host,$user,$passpass,$databasename);
         $query5 ="SELECT * FROM marker";
         $result5 = mysqli_query($Database,$query5);
         while ($data5 = mysqli_fetch_assoc($result5)) {
                                  echo "<option value='" . $data5['Marker_Id'] . "'>" . $data5['Marker_Name'] . "</option>";
         }
    ?>
    </select><br><br>
    <label>Node_Name</label>
    <br><br>
    <select  name="Equipment_Name"  style="width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;"required>
    <option value="<?php echo  $Equipment_ID ?>"><?php echo  $NodeName;?></option>
    <?php 
        $host = 'sql309.infinityfree.com';
        $user='if0_35028557';
        $passpass='KwI7f3dRthY';
        $databasename = 'if0_35028557_map';
         $Database = mysqli_connect($host,$user,$passpass,$databasename);
         $query5 ="SELECT * FROM equipment";
         $result5 = mysqli_query($Database,$query5);
         while ($data5 = mysqli_fetch_assoc($result5)) {
                     echo "<option value='" . $data5['Equipment_Id'] . "'>" . $data5['Equipment_Name'] . "</option>";
         }
    ?>
    </select>
    <br><br>
    <label>Slot_Name</label>    <br><br>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_Name'><option value='<?php echo $Slot_Name;?>'><?php echo $Slot_Name;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select><br><br>
    <label>Port 1</label>
    <input type='text' placeholder='Port_1'name='Port_1'value="<?php echo $Port_1;?>">
    <label>Port 2</label>
    <input type='text' placeholder='Port_2'name='Port_2'value="<?php echo $Port_2;?>">
    <label>Port 3</label>
    <input type='text' placeholder='Port_3'name='Port_3'value="<?php echo $Port_3;?>">
    <label>Port 4</label>
    <input type='text' placeholder='Port_4'name='Port_4'value="<?php echo $Port_4;?>">
    <label>Port 5</label>
    <input type='text' placeholder='Port_5'name='Port_5'value="<?php echo $Port_5;?>">
    <label>Port 6</label>
    <input type='text' placeholder='Port_6'name='Port_6'value="<?php echo $Port_6;?>">
    <label>Port 7</label>
    <input type='text' placeholder='Port_7'name='Port_7'value="<?php echo $Port_7;?>">
    <label>Port 8</label>
    <input type='text' placeholder='Port_8'name='Port_8'value="<?php echo $Port_8;?>">
    <label>Port 9</label>
    <input type='text' placeholder='Port_9'name='Port_9'value="<?php echo $Port_9;?>">
    <label>Port 10</label>
    <input type='text' placeholder='Port_10'name='Port_10'value="<?php echo $Port_10;?>">
    <label>Port 11</label>
    <input type='text' placeholder='Port_11'name='Port_11'value="<?php echo $Port_11;?>">
    <label>Port 12</label>
    <input type='text' placeholder='Port_12'name='Port_12'value="<?php echo $Port_12;?>">
    <label>Port 13</label>
    <input type='text' placeholder='Port_13'name='Port_13'value="<?php echo $Port_13;?>">
    <label>Port 14</label>
    <input type='text' placeholder='Port_14'name='Port_14'value="<?php echo $Port_14;?>">
    <label>Port 15</label>
    <input type='text' placeholder='Port_15'name='Port_15'value="<?php echo $Port_15;?>">
    <label>Port 16</label>
    <input type='text' placeholder='Port_16'name='Port_16'value="<?php echo $Port_16;?>">

    <br><br>
    <input type="submit"name="Edit_Service"value="Edit Service">
    <br><br><br>
    </div>
    <br>
    <br>
    </form>
    <form method="post">
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
if(isset($_POST['Edit_Service'])){
   $Substation_Name = trim(strip_tags($_POST['Substation_Name']));
   $Equipment_Name = trim(strip_tags($_POST['Equipment_Name']));
   $Slot_Name = trim(strip_tags($_POST['Slot_Name']));
   $Port_1 = trim(strip_tags($_POST['Port_1']));
   $Port_2 = trim(strip_tags($_POST['Port_2']));
   $Port_3 = trim(strip_tags($_POST['Port_3']));
   $Port_4 = trim(strip_tags($_POST['Port_4']));
   $Port_5 = trim(strip_tags($_POST['Port_5']));
   $Port_6 = trim(strip_tags($_POST['Port_6']));
   $Port_7 = trim(strip_tags($_POST['Port_7']));
   $Port_8 = trim(strip_tags($_POST['Port_8']));
   $Port_9 = trim(strip_tags($_POST['Port_9']));
   $Port_10 = trim(strip_tags($_POST['Port_10']));
   $Port_11 = trim(strip_tags($_POST['Port_11']));
   $Port_12 = trim(strip_tags($_POST['Port_12']));
   $Port_13 = trim(strip_tags($_POST['Port_13']));
   $Port_14 = trim(strip_tags($_POST['Port_14']));
   $Port_15 = trim(strip_tags($_POST['Port_15']));
   $Port_16 = trim(strip_tags($_POST['Port_16']));
   $update ="Update services set Substation_ID ='$Substation_Name',Equipment_ID = '$Equipment_Name',Slot_Name='$Slot_Name',Port_1='$Port_1',Port_2='$Port_2',Port_3='$Port_3',Port_4='$Port_4',Port_5='$Port_5',Port_6='$Port_6',Port_7='$Port_7',Port_8='$Port_8',Port_9='$Port_9',Port_10='$Port_10',Port_11='$Port_11',Port_12='$Port_12',Port_13='$Port_13',Port_14='$Port_14',Port_15='$Port_15',Port_16='$Port_16' where Service_ID = '$ID'";
   $query_update = mysqli_query($Database,$update);
   echo '<meta http-equiv="refresh" content="0;Map.php">';
}
         if(isset($_POST['Back'])){
        echo '<meta http-equiv="refresh" content="0;Map.php">';}
?>