<?php session_start(); ?>
<?php include("database.php"); ?>
<?php
if(isset($_POST['submit']))
{
$myname = $_POST['name'];
$mypassword = $_POST['pass'];

$sql = "SELECT * FROM admin WHERE username = '$myname' and password = '$mypassword'";

$res = $conn->query($sql);

$count = mysqli_num_rows($res);

if( $count==1)
{
   header('Location:admin.php');
}
else
  echo"<script>alert('enter correct username and password')</script>";
}
?>

 
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/admin_login.css" media="all" href="">
	<link rel="shortcut icon" href="images/logo/cart.png" type="image/x-icon">
</head>

<body>
<div class="container">
  <div class="loginform">
       <div class="login_top">
	       <p>ADMIN LOGIN</p>
	   </div>
	   
       <div class="login_main">
           <form  method="POST" action="">
             <input type="text" name="name" placeholder="username"><br>
             <input type="password" name="pass" placeholder="Password"><br>
             <input type="submit" name="submit" value="SIGN IN">
          </form>
      </div>
  </div>
</div>
</body>
</html>
   