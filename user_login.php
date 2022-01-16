<?php session_start(); ?>
<?php include("header.php") ?>
<?php include("menu.php") ?>
<?php include("database.php");?>

<?php

if(isset($_POST['submit']))
{
        $myname = $_POST['username'];
        $mypassword = $_POST['pass'];

        $sql = "select * from user where username = '$myname' and password = '$mypassword'";

        $res = $conn->query($sql);

        $count = mysqli_num_rows($res);

                  if( $count==1)
                  {
                    echo "Login Succesfull";
                  }
                  else
                     echo"<script>location.href='user_login.php';</script>";

        $row = $res->fetch_assoc();

        $_SESSION['lopon'] = "$row[u_id]";
        
        echo"<script>location.href='account.php';</script>";
}

?>

<div class="login-main">
    <div class="login-form">
      

     <div class="login_top">
	       <h3> Login Here</h3>
	   </div>
	   
       <div class="login_main">
           <form  method="post" action="">
           <label for="username">Username</label><br><input type="text" name="username" placeholder="Username" required><br>
           <label for="email">Password</label><br><input type="password" name="pass" placeholder="Password" required><br>
           <span class="login_sub"><input type="submit" name="submit" value="SIGN IN"></span>
		   <p>Not a member?<a href="user_register.php"> Register now</a></p>			

           </form>
      </div>
	</div>  
</div>
   
<?php include("footer.php");?>