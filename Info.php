<!DOCTYPE html>
<html>

<head>
<style>
td,th 
{
width: 150px;
text-align: center;
}
input {
        font-size: 20px;
        color: black;
        font-weight: bold;
        margin-right: 25px;
        width: 450px;
        height: 45px;
        margin-top: 50px;
        cursor:pointer;
    }
</style>
</head>

<body>
<form method="post">
            <input type="submit" name="Back" value="Back To Map"style="
        font-size: 20px;
        color: black;
        font-weight: bold;
        width: 250px;
        height: 40px;
        cursor:pointer;
        float:right;
        background-color:rgb(185, 169, 143)">
    </form>
    <br><br><br><br><br>
    <form method="post">
    <center>
        <?php $n=$_GET['Marker_Name'];
                $host = 'sql309.infinityfree.com';
        $user = 'if0_35028557';
        $passpass = 'KwI7f3dRthY';
        $databasename = 'if0_35028557_map';
        $Database = mysqli_connect($host, $user, $passpass, $databasename);

        $select = "select Marker_Id from marker where Marker_Name = '$n'";
        $result = mysqli_query($Database, $select);
        $row = mysqli_fetch_array($result);
                $Marker_ID = $row['Marker_Id'];
        ?>
            <h1>All Information About Substation : <?php echo $n?></h1>
            <input type="submit" name="Markers" value="About Substation <?php echo ' : '.$n?>">
            <input type="submit" name="Pathes" value="Links With Substation <?php echo ' : '.$n?>"><br>
            <input type="submit" name="Equipments" value="Nodes Associate With <?php echo ' : '.$n?>">
            <input type="submit" name="Services" value="Services Associate With <?php echo ' : '.$n?>">
    </form>
</center>
</body>
</html>

<?php
    $host = 'sql309.infinityfree.com';
    $user='if0_35028557';
    $passpass='KwI7f3dRthY';
    $databasename = 'if0_35028557_map';
    $n=$_GET['Marker_Name'];
    $Database = mysqli_connect($host,$user,$passpass,$databasename);
    $select = "select  *  from marker where  Marker_Name = '$n'";
    $query_select = mysqli_query($Database,$select);
    if(isset($_POST['Markers']))
    {
        echo '
        <br><br>
        <br>
        <center>
        <table style="font-size: 1.1rem">
        <tr>
              <th style="border: 1px solid #e9ecef">Substation_ID</th>
              <th style="border: 1px solid #e9ecef">Substation_Name</th>
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
      $select2 = "select  *  from equipment where Substation_ID ='$Marker_ID'";
            $query_select2 = mysqli_query($Database,$select2);
    if(isset($_POST['Equipments']))
    {
        echo '
        <br><br>
        <br>
        <center>
        <br>
<table style="font-size: 1.1rem">
<tr>
<th style="border: 1px solid #e9ecef">Station</th>
<th style="border: 1px solid #e9ecef">Node_ID</th>
<th style="border: 1px solid #e9ecef">Node_Name</th>
<th style="border: 1px solid #e9ecef">Node_Type</th>
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
    while($row2 = mysqli_fetch_array($query_select2)){

        
     ?>
<tr>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $n?></td>  
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;">Node - <?php echo $row2["Equipment_Id"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Equipment_Name"]?></td>  
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Equipment_type"]?></td>  
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_1"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_2"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_3"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_4"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_5"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_6"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_7"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_8"]?></td>   
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_9"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_10"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_11"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_12"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_13"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_14"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row2["Slot_15"]?></td>   
</tr>
<?php
}}
?>
<?php
$select3 = "select  *  from pathes where Substation_A = '$n' OR Substation_B = '$n'";
$query_select3 = mysqli_query($Database,$select3);
    if(isset($_POST['Pathes']))
    {
        echo '
        <br><br>
        <br>
        <center>
        <table style="font-size: 1.1rem">
        <tr>
        <th style="border: 1px solid #e9ecef">Link_ID</th>
            <th style="border: 1px solid #e9ecef">Link_Name</th>
            <th style="border: 1px solid #e9ecef">Substation_A</th>
            <th style="border: 1px solid #e9ecef">Substation_B</th>
            <th style="border: 1px solid #e9ecef">Link_Type</th>
            <th style="border: 1px solid #e9ecef">More_Information</th>
        </tr>
    ';
    while($row3 = mysqli_fetch_array($query_select3)){
        if($row3["Path_type"] == "Red")
        {
            $x= "OTN 10G";
        }
        else if($row3["Path_type"] == "Yellow")
        {
            $x= "OTN 1G";
        }
        else if($row3["Path_type"] == "Blue")
        {
            $x= "Coriant 10G";
        }
        else if($row3["Path_type"] == "Green")
        {
            $x= "Coriant 1G";
        }
     ?>
    <tr>
        <td style="border: 1px solid #e9ecef">Link - <?php echo $row3["Path_Id"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row3["Path_Name"]?> </td>
        <td style="border: 1px solid #e9ecef"><?php echo $row3["Substation_A"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row3["Substation_B"]?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $x . " ( " . "  " .  $row3["Path_type"] . " )"?></td>
        <td style="border: 1px solid #e9ecef"><?php echo $row3["Additional_Information"]?></td> 
    </tr>
<?php
}}
?>


<?php

    if(isset($_POST['Services']))
    {
            $host = 'sql309.infinityfree.com';
    $user='if0_35028557';
    $passpass='KwI7f3dRthY';
    $databasename = 'if0_35028557_map';
    $Database = mysqli_connect($host,$user,$passpass,$databasename);
                      $select4 = "select  *  from services where Substation_ID = '$Marker_ID'";
      $query_select4 = mysqli_query($Database,$select4);  
        echo '
        <br><br>
        <br>
        <center>
        <br>
<table style="font-size: 1.1rem">
<tr>
<th style="border: 1px solid #e9ecef">Station</th>
<th style="border: 1px solid #e9ecef">S_ID</th>
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
</tr>
    ';
    while($row8 = mysqli_fetch_array($query_select4)){
     ?>
<tr>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $n?></td>  
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;">S - <?php echo $row8["Service_ID"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Equipment_ID"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Slot_Name"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_1"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_2"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_3"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_4"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_5"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_6"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_7"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_8"]?></td>   
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_9"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_10"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_11"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_12"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_13"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_14"]?></td>
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_15"]?></td>   
<td style="border: 1px solid #e9ecef;width:95px;height:30px;text-align: center;font-size: 13px;"><?php echo $row8["Port_16"]?></td> 
</tr>
<?php
}}
?>

    <?php
             if(isset($_POST['Back'])){
        echo '<meta http-equiv="refresh" content="0;Map.php">';}
    ?>