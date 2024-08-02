 <style>
        input,button
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
        td
        {
            width:95px;
            height:30px;
            text-align: center;
            font-size: 14px;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('#country').on('change', function(){
var countryID = $(this).val();
if(countryID){
$.ajax({
type:'POST',
url:'ajaxData.php',
data:'country_id='+countryID,
success:function(html){
$('#state').html(html);
$('#city').html('<option value="">Select Node First</option>');
}
});
}else{
$('#state').html('<option value="">Select Substation First</option>');
$('#city').html('<option value="">Select Node First</option>');
}
});

$('#state').on('change', function(){
var stateID = $(this).val();
if(stateID){
$.ajax({
type:'POST',
url:'ajaxData.php',
data:'state_id='+stateID,
success:function(html){
$('#city').html(html);
}
});
}else{
$('#city').html('<option value="">Select Node first</option>');
}
});
});
</script>
<body>
 <center>
        <br><br>
    <div>
    <h1>Add Service</h1>
    <br>
<form action="" method="post">
<?php
include_once 'db.php';
$query = "SELECT * FROM marker";
$result = $con->query($query);
?>
<label>Substation</label><br><br>
<select id="country" name="Substation_Name" style="width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;">
<option value="">Select Substation</option>
<?php
while($row = $result->fetch_assoc()){
echo '<option value="'.$row['Marker_Id'].'">'.$row['Marker_Name'].'</option>';
}
?>
</select>
<br><br>
    <label>Node_Name</label><br><br>
<select id="state" name="Node" style="width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;">
<option value="">Select Node</option>
</select>
<br>
<br>
<label>Slot_Name</label><br><br>
<select id="city" name="Slot_Name" onchange="showNextDropLists(this.value)" style='width:300px;height: 35px;font-size: 20px;color:black;font-weight: bold;margin-right:25px;margin-bottom:10px'>
<option value="">Select Slot</option>
</select>
 <div id="next-drop-lists">
        <!-- هنا سوف يظهر ال drop lists الإضافية -->
    </div>
    <script>
        function showNextDropLists(value) {
            var nextDropLists = document.getElementById("next-drop-lists");

            // قم بتفريغ الـ div قبل إضافة drop lists جديدة
            nextDropLists.innerHTML = "";        

            if (value === "4-GO-LW") {
                // إضافة 10 drop lists إلى الـ div
                for (var i = 1; i <= 4; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            } else if (value === "4-GC-LW") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 4; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            } else if (value === "1-10G-LW") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 1; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            }
            else if (value === "4-10G-LW") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 4; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            }
            else if (value === "16-E1-L") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 16; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            }
            else if (value === "8-FXS") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 8; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            }
            else if (value === "6-GE-L") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 6; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            }
            else if (value === "4-CODIR") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 4; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            }
            else if (value === "2-C37.94") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 16; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            }
            else if (value === "4-2/4WEM") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 4; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            }
            else if (value === "7-SERIAL") {
                // إضافة 15 drop lists إلى الـ div
                for (var i = 1; i <= 7; i++) {
                    nextDropLists.innerHTML += "<input  type='text' placeholder='Port "+i+"'name='Port"+i+"'value='Nill'><br><br>";
                }
            }
            
        }
    </script>
    <br><br>
    <input type="submit"name="Add_Serivce"value="Add Service">
</form>
 <br>
    </div>
    <br>
    <br>
    <label>All Services</label>
<br>
<br>
<table style="font-size: 1.1rem">
    <tr>
        <th style="border: 1px solid #e9ecef">ID</th>
        <th style="border: 1px solid #e9ecef">Station</th>
        <th style="border: 1px solid #e9ecef">Node_Name</th>
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
     $select = "select * from services";
     $query_select = mysqli_query($Database,$select);
     $count = mysqli_num_rows($query_select);
     $ID_Counting = 0;
     while($row = mysqli_fetch_array($query_select)){

        $MarkerID = $row['Substation_ID'];
        $NodeID = $row['Equipment_ID'];
        $select2 = "select Marker_Name  from marker where Marker_Id = '$MarkerID'";
        $query_select2 = mysqli_query($Database,$select2);
        $row2 = mysqli_fetch_array($query_select2);
        $MarkerName = $row2['Marker_Name'];
        $select3 = "select Equipment_Name  from equipment where Equipment_Id ='$NodeID'";
        $query_select3 = mysqli_query($Database,$select3);
        $row3 = mysqli_fetch_array($query_select3);
        $NodeName = $row3['Equipment_Name'];
        $ID_Counting+=1;
    ?>
    <tr>
        <td style="border: 1px solid #e9ecef">S - <?php echo $row["Service_ID"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row2["Marker_Name"]?></td>  
        <td style="border: 1px solid #e9ecef"><?php echo $row3['Equipment_Name']?></td>  
        <td style="border: 1px solid #e9ecef"><?php echo $row["Slot_Name"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_1"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_2"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_3"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_4"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_5"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_6"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_7"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_8"]?></td>   
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_9"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_10"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_11"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_12"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_13"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_14"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_15"]?></td>   
        <td style="border: 1px solid #e9ecef"><?php echo $row["Port_16"]?></td> 
        <td style="border: 1px solid #e9ecef"><center> <a style="font-weight:bold;text-decoration:none" name="Edit"href="Delete_Service.php?Marker_Name=<?php echo $n?>&ID=<?php echo $row["Service_ID"]?>&lat=<?php echo $lat?>&lng=<?php echo $lng?>">Delete</a></center></td> 
        <td style="border: 1px solid #e9ecef"><center> <a style="font-weight:bold;text-decoration:none" name="Edit"href="Edit_Service.php?Marker_Name=<?php echo $n?>&ID=<?php echo $row["Service_ID"]?>&lat=<?php echo $lat?>&lng=<?php echo $lng?>">Edit</a></center></td> 
    </tr>
    <?php
}
?>











 </table>
    <br><br>
    <form method="post">
    <input type="submit"name="Add_Node"value="Add Nodes">
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


<?php
if(isset($_POST['Add_Serivce'])){
        $host = 'sql309.infinityfree.com';
        $user = 'if0_35028557';
        $passpass = 'KwI7f3dRthY';
        $databasename = 'if0_35028557_map';
        $Database = mysqli_connect($host, $user, $passpass, $databasename);
        $Substation_ID = trim(strip_tags($_POST['Substation_Name']));
        $Node = trim(strip_tags($_POST['Node']));
        $Slot = trim(strip_tags($_POST['Slot_Name']));
        $insert = "INSERT INTO services (Equipment_ID,Substation_ID,Slot_Name";
        $values = "VALUES ('$Node','$Substation_ID','$Slot'";

    for($x = 1 ; $x <= 16; $x++) {
        $Port = trim(strip_tags($_POST['Port'.$x]));
        if($Port == "")
        {     
        $Port = "Nill"; 
        }
        else
        {
        $Port = trim(strip_tags($_POST['Port'.$x]));
        $insert .= ", Port_$x";
        $values .= ", '$Port'";
        }

    }

    $insert .= ") " . $values . ")";
    $query_insert = mysqli_query($Database,$insert);   
   echo '<meta http-equiv="refresh" content="0;Map.php">';
}
if(isset($_POST['Add_Markers'])){
    echo '<meta http-equiv="refresh" content="0;Markers.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
    if(isset($_POST['Add_Pathes'])){
        echo '<meta http-equiv="refresh" content="0;Pathes.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
            if(isset($_POST['Add_Node'])){
        echo '<meta http-equiv="refresh" content="0;MoreInfo.php?Marker_Name='.$n.'&lat='.$lat.'&lng='.$lng.'">';}
         if(isset($_POST['Back'])){
        echo '<meta http-equiv="refresh" content="0;Map.php">';}
?>