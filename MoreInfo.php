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
            margin-right: 25px;
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
        td
        {
            width:95px;
            height:30px;
            text-align: center;
            font-size: 13px;
        }
        th
        {
            width:95px;
            height:30px;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <center>

    <form method="post">
    <div>
    <h1>Add Node</h1>
    <br>
    <label>Node_Name</label>
    <input  type="text" placeholder="Node_Name"name="Node_Name"required><br><br>
        <label>Substation</label>
    <select name="Substation_Name"style="width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;" required>
                <option></option>
                <?PHP
                      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
           $Database = mysqli_connect($host,$user,$passpass,$databasename);
                $query5 ="SELECT * FROM marker";
                $result5 = mysqli_query($Database,$query5);
                while ($data5 = mysqli_fetch_assoc($result5)) {
                  echo '<option  value="'.$data5['Marker_Id'].'">'.$data5['Marker_Name'].'</option>';}?>
    </select>
    <br><br>
    <label>Node_Type</label>
    <select  name="Equipment_Type"  style="width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;"required onchange="showNextDropLists(this.value)">
    <option></option>
    <option value="XT-2210">XT-2210</option>
    <option value="XT-2215">XT-2215</option>
    <option value="Other">Other</option>
    </select>
    <br><br>
    <div id="next-drop-lists">
        <!-- هنا سوف يظهر ال drop lists الإضافية -->
    </div>
    <script>
        function showNextDropLists(value) {
            var nextDropLists = document.getElementById("next-drop-lists");

            // قم بتفريغ الـ div قبل إضافة drop lists جديدة
            nextDropLists.innerHTML = "";

            if (value === "XT-2210") {
                // إضافة 10 drop lists إلى الـ div
                for (var i = 1; i <= 10; i++) {
                    nextDropLists.innerHTML += "<select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot"+i+"'required><option value=''></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>";
                }
            } else if (value === "XT-2215") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 15; i++) {
                    nextDropLists.innerHTML += "<select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot"+i+"'required><option value=''></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>";
                }
            } else if (value === "Other") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 15; i++) {
                    nextDropLists.innerHTML += "<select style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'name='Slot"+i+"'required><option value=''></option><option value='4-GO-LW'>4-GO-LW</option><option value='4-GC-LW'>4-GC-LW</option><option value='1-10G-LW'>1-10G-LW</option><option value='4-10G-LW'>4-10G-LW</option><option value='16-E1-L'>16-E1-L</option><option value='8-FXS'>8-FXS</option><option value='6-GE-L'>6-GE-L</option><option value='4-CODIR'>4-CODIR</option><option value='2-C37.94'>2-C37.94</option><option value='4-2/4WEM'>4-2/4WEM</option><option value='7-SERIAL'>7-SERIAL</option><option value='Dummy Slot'>Dummy Slot</option></select>";
                }
            }
        }
    </script>
   
    <br><br>
    <input type="submit"name="Add_Equipment"value="Add Node">
    <br><br><br>
    </div>
    <br>
    <br>
    <label>All Nodes</label>
<br>
<br>
    <table style="font-size: 1.1rem">
    <tr>
        <th style="border: 1px solid #e9ecef">ID</th>
        <th style="border: 1px solid #e9ecef">Name</th>
        <th style="border: 1px solid #e9ecef">Type</th>
        <th style="border: 1px solid #e9ecef">Substation</th>
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
        <th style="border: 1px solid #e9ecef">Delete</th>
        <th style="border: 1px solid #e9ecef">Edit</th>
    </tr>
    <?php
     $n=$_GET['Marker_Name'];
     $lat=$_GET['lat'];
     $lng=$_GET['lng'];
     $host = 'sql309.infinityfree.com';
     $user='if0_35028557';
     $passpass='KwI7f3dRthY';
     $databasename = 'if0_35028557_map';
     $Database = mysqli_connect($host,$user,$passpass,$databasename);
     $select = "select * from equipment";
     $query_select = mysqli_query($Database,$select);
     $Marker_Id = $row['Substation_ID'];



     $ID_Counting = 0;
     while($row = mysqli_fetch_array($query_select)){
              $Marker_Id = $row['Substation_ID'];
                        $select2 = "select Marker_Name from marker where Marker_Id = '$Marker_Id' ";
     $query_select2 = mysqli_query($Database,$select2);
     $row2 = mysqli_fetch_array($query_select2);
     $Marker_Name = $row2['Marker_Name'];
        $ID_Counting+=1;
    ?>
    <tr>
        <td style="border: 1px solid #e9ecef">Eq - <?php echo $row["Equipment_Id"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Equipment_Name"]?></td>  
        <td style="border: 1px solid #e9ecef"><?php echo $row["Equipment_type"]?></td>  
        <td style="border: 1px solid #e9ecef"><?php echo $row2["Marker_Name"]?></td>  
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_1"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_2"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_3"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_4"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_5"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_6"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_7"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_8"]?></td>   
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_9"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_10"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_11"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_12"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_13"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_14"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_15"]?></td>   
        <td style="border: 1px solid #e9ecef"><center> <a style="font-weight:bold;text-decoration:none" name="Edit"href="Delete_Equipment.php?Marker_Name=<?php echo $n?>&ID=<?php echo $row["Equipment_Id"]?>&lat=<?php echo $lat?>&lng=<?php echo $lng?>">Delete</center></td> 
        <td style="border: 1px solid #e9ecef"><center> <a style="font-weight:bold;text-decoration:none" name="Edit"href="Edit_Equipment.php?Marker_Name=<?php echo $n?>&ID=<?php echo $row["Equipment_Id"]?>&lat=<?php echo $lat?>&lng=<?php echo $lng?>">Edit</center></td> 
    </tr>
    <?php
}
?>
<?php
if($count ==0){
$ID_Increment = "ALTER TABLE equipment AUTO_INCREMENT = 1";
$query_A_I = mysqli_query($Database,$ID_Increment);
}
?>
    </table>
    <br><br>
    </form>
    <form method="post">
    <input type="submit"name="Add_Serivces"value="Add Services">
    <input type="submit"name="Add_Markers"value="Add Substations">
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
if(isset($_POST['Add_Equipment'])){
    $Node_Name = trim(strip_tags($_POST['Node_Name']));
    $Equipment_Type = trim(strip_tags($_POST['Equipment_Type']));
    $Substation_Name = trim(strip_tags($_POST['Substation_Name']));
    $insert = "INSERT INTO equipment (Equipment_type,Substation_ID,Equipment_Name";
    $values = "VALUES ('$Equipment_Type','$Substation_Name','$Node_Name'";

    for($x = 1 ; $x <= 15; $x++) {
        $Slot = trim(strip_tags($_POST['Slot'.$x]));
        $insert .= ", Slot_$x";
        $values .= ", '$Slot'";
    }

    $insert .= ") " . $values . ")";
    $query_insert = mysqli_query($Database, $insert);
   echo '<meta http-equiv="refresh" content="0;MoreInfo.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';
}
if(isset($_POST['Add_Markers'])){
    echo '<meta http-equiv="refresh" content="0;Markers.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
    if(isset($_POST['Add_Pathes'])){
        echo '<meta http-equiv="refresh" content="0;Pathes.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
        if(isset($_POST['Add_Serivces'])){
            echo '<meta http-equiv="refresh" content="0;Services.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
                     if(isset($_POST['Back'])){
        echo '<meta http-equiv="refresh" content="0;Map.php">';}
?>