<?php
      $host = 'sql309.infinityfree.com';
      $user='if0_35028557';
      $passpass='KwI7f3dRthY';
      $databasename = 'if0_35028557_map';
$Database = mysqli_connect($host,$user,$passpass,$databasename);



$username ="";
$password ="";
$type="User";
$username_Error = $password_Error ="";

if(isset($_POST['login']))
{
    if($_POST['type'] == "User")
    {
    $name = $_POST['username'];
    $pass = trim( $_POST['password']);
    $type = $_POST['type'];
        $log = $Database->query("SELECT *  FROM login WHERE Username = '$name' and Password = '$pass' and Type='User'");
        if($log->num_rows == 1) {
            //header("location:Map.php?type=$type");
            echo '<meta http-equiv="refresh" content="0;Data.php?type='.$type.'">';
        }
        else if($log->num_rows == 0) {
 echo "<script>alert('The username or password you entered is incorrect!');</script>";
        }
}
elseif($_POST['type'] == "Admin")
{
$name = $_POST['username'];
$pass = trim( $_POST['password']);
$type = $_POST['type'];
    $log = $Database->query("SELECT *  FROM login WHERE Username = '$name' and Password = '$pass' and Type = '$type' ");
    if($log->num_rows == 1) {
        echo '<meta http-equiv="refresh" content="0;Map.php?type='.$type.'">';
        $Database->close();
    }
    else if($log->num_rows == 0) {
echo "<script>alert('The Username or Password you entered is incorrect!');</script>";
    }
}
}
?>

<style>
*{
  margin: 0px;
  padding: 0px;;
}

body{
  font-family: Arial, Helvetica, sans-serif;
}

.container
{
  display: grid;
  grid-template-columns: 1fr 2fr;
  background-color: red;
  background: linear-gradient(to bottom,rgb(185, 169, 143) , rgb(84, 102, 78));
  width: 800px;
  height: 400px;
  margin: 10% auto;;
  border-radius: 5px;
}

.content-holder
{
  text-align: center;
  color: white;
  font-size: 14px;
  font-weight: lighter;
  letter-spacing: 2px;
  margin-top: 15%;
  padding: 50px;
}

.content-holder h2
{
  font-size: 30px;
}

.content-holder p
{
  margin: 30px auto;
}

.content-holder button
{
  border:none;
  font-size: 15px;
  padding: 10px;
  border-radius: 6px;
  background-color: white;
  width: 150px;
  margin: 20px auto;
}


.box-2{
  background-color: white;

  margin: 5px;
}

.login-form-container
{
  text-align: center;
  margin-top: 10%;

}

.login-form-container h1
{
  color: black;
  font-size: 24px;
  padding: 20px;
}

.input-field
{
  box-sizing: border-box;
  font-size: 16px;
  font-weight: bold;
  padding: 10px;
  border-radius: 7px;
  border: 1px solid rgb(168, 168, 168);
  width: 250px;
  outline: none;
}

.login-button{
  box-sizing: border-box;
  color: white;
  font-size: 20px;
  font-weight:bold;
  padding: 13px;
  border-radius: 7px;
  border: none;
  width: 200px;
  outline: none;
  cursor:pointer;
}

.button-2
{
  display: none;
}
</style>
<div class="container">

      <!--Data or Content-->
      <div class="box-1">
          <div class="content-holder">
          <img src="IMG.png"width="140px"height="140px">
          <h2>NG MPLS-TP Network(EOA)</h2>
          </div>
      </div>

      
      <!--Forms-->
      <div class="box-2">
          <div class="login-form-container">
          <form method="post">
              <h1>Login Form</h1>
              <input type="text" placeholder="Username" class="input-field"name="username" required >
              <br><br>
              <input type="password" placeholder="Password" class="input-field"name="password" required minlength = "8">
              <br><br>
              <h4>
              Select User Type
              <br><br>
              </h4>    
              User
              <input type="radio"  name="type" value="User" required>
              Admin
              <input type="radio"  name="type" value="Admin" required>  
              <br><br>
              <input class="login-button" type="submit"name="login"value="Login"style="background:rgb(119, 130, 103)">
              </form>
          </div>

      </div>
      </div>