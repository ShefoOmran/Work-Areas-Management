<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<?php
include_once 'db.php';

if (!empty($_POST["country_id"])) {
$cid = $_POST["country_id"];
$query = "SELECT * FROM equipment WHERE Substation_ID = '$cid'";
$result = $con->query($query);
echo '<option value="">Select Node</option>'; 
while ($row = $result->fetch_assoc()) {
echo '<option value="'.$row['Equipment_Id'].'">'.$row['Equipment_Name'].'</option>';
}
} elseif (!empty($_POST["state_id"])) {
$sid = $_POST["state_id"];
$query = "SELECT * FROM equipment WHERE Equipment_Id = '$sid'";
$result = $con->query($query);
 echo '<option value="">Select Slot</option>';
while ($row = $result->fetch_assoc()) {
for ($i=1; $i<=15; $i++) {
if (!empty($row['Slot_'.$i])) {
echo '<option value="'.$row['Slot_'.$i].'">'.$row['Slot_'.$i].'</option>';
}
}
}
}
?>