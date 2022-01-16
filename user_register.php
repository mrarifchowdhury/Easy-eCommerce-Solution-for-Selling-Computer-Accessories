<?php
include("header.php");
include("menu.php");
include("database.php");

$email_Err = $phone_Err = "" ;





if(isset($_POST['submit']))
{
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$password = $_POST['pass'];  
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $phone = $_POST['phone']; 


      $qcheck = "SELECT * FROM `user` WHERE `email` = '$email' ";

      $email_Err_check = $conn->query($qcheck);

      $count1=mysqli_num_rows($email_Err_check);  

      $qcheck1 = "SELECT * FROM `user` WHERE `phone` = '$phone'";

      $phone_Err_check = $conn->query($qcheck1);
      
      $count2=mysqli_num_rows($phone_Err_check);  


if ($count1>0 && $count2>0) {

  $email_Err = "Email Already Exist" ;
  $phone_Err = "Phone Number Already Exist" ;
  
} 


elseif ($count2) {
 
  $phone_Err = "Phone Number Alreaydy Exist" ;
}

elseif ($count1) {
 
  $email_Err = "Email Already Exist" ; 
}


else{


    $sql = "insert into user (f_name,l_name,phone,username,email,password) values ('$f_name','$l_name','$phone','$username','$email','$password')";
        
       $res = $conn->query($sql);

       if(!$res)
       {
         echo "<p class='error'>Unsuccessfull In Register</p>";
       } 
        
       else
          {


echo '<script language="javascript">';
echo 'alert("Registration Sucessfull!")';
echo '</script>';
echo "<script> document.location.href='user_login.php';</script>";

            

          }

}








   
}
?>

<html>
<body>

<div class="login-form">
       <div class="login_top">
	       <h3> New Customer</h3>
	   </div>
	   
       <div class="register_main">
           <form  method="POST" action="">



  <label for="Name">First Name :</label><br><span class="text"><input type="text" name="f_name" placeholder="First Name"  pattern="^[a-zA-Z\s]+$" title="only letters" required><span><br>

  <label for="Name">Last Name :</label><br><span class="text"><input type="text" name="l_name" placeholder="Last Name" pattern="^[a-zA-Z\s]+$" title="only letters" required><span><br>

  
  <label for="Name">Phone : 
  <span style=" margin-left:210px;background-color: red;border: 1px solid #F2F2F2;border-radius: 6px; color:white;">
  <?=$phone_Err; ?>
  </span> 
  </label><br>
  <span class="text">
  <input type="text" name="phone" placeholder="Phone number" pattern="[0-9]+" title="Numbers only" maxlength="11" required> <span> <br>
          


		       <label for="Name">Username</label><br><span class="text"><input type="text" name="uname" placeholder="Name" required><span><br>

<label for="email">Email :
<span style=" margin-left:280px;background-color: red;border: 1px solid #F2F2F2;border-radius: 6px; color:white; ">
<?= $email_Err; ?>
</span>
</label>
<br>
<input type="email" name="email" placeholder="Email" required><br>

           <label for="email">Password</label><br><input type="password" name="pass" placeholder="Password" required><br>

           <span class="reg_submit"><input type="submit" name="submit"  value="CREATE AN ACCOUNT"><span>
           </form>
      </div>
</div>
<?php include("footer.php");?>
</body>
</html>