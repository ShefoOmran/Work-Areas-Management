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
        $select = "select *  from equipment where Equipment_Id =$ID;";
        $query_select = mysqli_query($Database,$select);
        $row = mysqli_fetch_array($query_select);
        $Equipment_Type = $row['Equipment_type'];
        $Equipment_Name = $row['Equipment_Name'];
        $Substation_ID = $row['Substation_ID'];
        $Slot_1 = $row['Slot_1'];
        $Slot_2 = $row['Slot_2'];
        $Slot_3 = $row['Slot_3'];
        $Slot_4 = $row['Slot_4'];
        $Slot_5 = $row['Slot_5'];
        $Slot_6 = $row['Slot_6'];
        $Slot_7 = $row['Slot_7'];
        $Slot_8 = $row['Slot_8'];
        $Slot_9 = $row['Slot_9'];
        $Slot_10 = $row['Slot_10'];
        $Slot_11 = $row['Slot_11'];
        $Slot_12 = $row['Slot_12'];
        $Slot_13 = $row['Slot_13'];
        $Slot_14 = $row['Slot_14'];
        $Slot_15 = $row['Slot_15'];
        $select2 = "select Marker_Name  from marker where Marker_Id =$Substation_ID;";
        $query_select2 = mysqli_query($Database,$select2);
        $row2 = mysqli_fetch_array($query_select2);
        $Substation_Name = $row2['Marker_Name'];
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
            width:300px;
            height: 30px;
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
    <h1>Edit Node</h1>
    <br>
    <label>Node_Name</label>
    <input  type="text" placeholder="Node_Name"name="Equipment_Name"required value="<?php echo $Equipment_Name;?>"><br><br>
    <label>Substation</label>
    <select name="Substation_ID"style="width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;" required>
                <option value='$Substation_ID'><?php echo $Substation_Name?></option>
                <?PHP
                      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
           $Database = mysqli_connect($host,$user,$passpass,$databasename);
                $query5 ="SELECT * FROM marker";
                $result5 = mysqli_query($Database,$query5);
                while ($data5 = mysqli_fetch_assoc($result5)) {
                  echo '<option value="'.$data5['Marker_Id'].'">'.$data5['Marker_Name'].'</option>';}?>
    </select>
    <br><br>
        <label>Node_Type</label>
    <select  name="Equipment_Type"  style="width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;"value="<?php echo $Equipment_Type;?>" >
    <option><?php echo $Equipment_Type;?></option>
    <option value="XT-2210">XT-2210</option>
    <option value="XT-2215">XT-2215</option>
    <option value="Other">Other</option>
    </select>
    <br><br>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_1'><option value='<?php echo $Slot_1;?>'><?php echo $Slot_1;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_2'><option value='<?php echo $Slot_2;?>'><?php echo $Slot_2;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_3'><option value='<?php echo $Slot_3;?>'><?php echo $Slot_3;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_4'><option value='<?php echo $Slot_4;?>'><?php echo $Slot_4;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_5'><option value='<?php echo $Slot_5;?>'><?php echo $Slot_5;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_6'><option value='<?php echo $Slot_6;?>'><?php echo $Slot_6;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_7'><option value='<?php echo $Slot_7;?>'><?php echo $Slot_7;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_8'><option value='<?php echo $Slot_8;?>'><?php echo $Slot_8;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_9'><option value='<?php echo $Slot_9;?>'><?php echo $Slot_9;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_10'><option value='<?php echo $Slot_10;?>'><?php echo $Slot_10;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_11'><option value='<?php echo $Slot_11;?>'><?php echo $Slot_11;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_12'><option value='<?php echo $Slot_12;?>'><?php echo $Slot_12;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_13'><option value='<?php echo $Slot_13;?>'><?php echo $Slot_13;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_14'><option value='<?php echo $Slot_14;?>'><?php echo $Slot_14;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>
    <select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot_15'><option value='<?php echo $Slot_15;?>'><?php echo $Slot_15;?></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>

    <br><br>
    <input type="submit"name="Edit_Equipment"value="Edit Node">
    <br><br><br>
    </div>
    <br>
    <br>
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
if(isset($_POST['Edit_Equipment'])){
          $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
     $Database = mysqli_connect($host,$user,$passpass,$databasename);
   $Equipment_Type = trim(strip_tags($_POST['Equipment_Type']));
   $Equipment_Name = trim(strip_tags($_POST['Equipment_Name']));
   $Substation_ID = trim(strip_tags($_POST['Substation_ID']));
   $Slot_1 = trim(strip_tags($_POST['Slot_1']));
   $Slot_2 = trim(strip_tags($_POST['Slot_2']));
   $Slot_3 = trim(strip_tags($_POST['Slot_3']));
   $Slot_4 = trim(strip_tags($_POST['Slot_4']));
   $Slot_5 = trim(strip_tags($_POST['Slot_5']));
   $Slot_6 = trim(strip_tags($_POST['Slot_6']));
   $Slot_7 = trim(strip_tags($_POST['Slot_7']));
   $Slot_8 = trim(strip_tags($_POST['Slot_8']));
   $Slot_9 = trim(strip_tags($_POST['Slot_9']));
   $Slot_10 = trim(strip_tags($_POST['Slot_10']));
   $Slot_11 = trim(strip_tags($_POST['Slot_11']));
   $Slot_12 = trim(strip_tags($_POST['Slot_12']));
   $Slot_13 = trim(strip_tags($_POST['Slot_13']));
   $Slot_14 = trim(strip_tags($_POST['Slot_14']));
   $Slot_15 = trim(strip_tags($_POST['Slot_15']));
   $update ="Update equipment set Equipment_Name = '$Equipment_Name'  , Equipment_type ='$Equipment_Type',Substation_ID = '$Substation_ID',Slot_1='$Slot_1',Slot_2='$Slot_2',Slot_3='$Slot_3',Slot_4='$Slot_4',Slot_5='$Slot_5',Slot_6='$Slot_6',Slot_7='$Slot_7',Slot_8='$Slot_8',Slot_9='$Slot_9',Slot_10='$Slot_10',Slot_11='$Slot_11',Slot_12='$Slot_12',Slot_13='$Slot_13',Slot_14='$Slot_14',Slot_15='$Slot_15' where Equipment_Id = '$ID'";
   $query_update = mysqli_query($Database,$update);
   echo '<meta http-equiv="refresh" content="0;Map.php">';
}
         if(isset($_POST['Back'])){
        echo '<meta http-equiv="refresh" content="0;Map.php">';}
?>