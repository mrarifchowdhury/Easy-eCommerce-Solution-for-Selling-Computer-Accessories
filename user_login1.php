<?php include("header.php") ?>
<?php include("menu.php") ?>


<?php

if(isset($_POST['submit']))
{
   require_once("database.php");

        $myname = $_POST['username'];
        $mypassword = $_POST['pass'];

    $query = mysqli_query($conn, "select * from user where username = '$myname' and password = '$mypassword'");


    $redirect = "<script>document.location.href='checkout.php';</script>";

    $msg = '';
    $numrows = mysqli_num_rows($query);


    if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $uname = $row['username'];
            $u_id = $row['u_id'];
        }
        session_start();
        $_SESSION['uname'] = $uname;
        $_SESSION['u_id'] = $u_id;
        $_SESSION['client_access'] = "Ok";

        echo $redirect;
    }


     else 


     {
        $msg = "Invalid";
    }





 
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