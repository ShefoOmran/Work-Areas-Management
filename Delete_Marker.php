<?php
$n=$_GET['Marker_Name'];
$ID=$_GET['ID'];
$lat=$_GET['lat'];
$lng=$_GET['lng'];
      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
$Database = mysqli_connect($host,$user,$passpass,$databasename);

$del = mysqli_query($Database,"delete from marker where Marker_Id = $ID"); // delete query
if($del)
{
    mysqli_close($Database); // Close connection
    echo '<meta http-equiv="refresh" content="0;Map.php">';
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
