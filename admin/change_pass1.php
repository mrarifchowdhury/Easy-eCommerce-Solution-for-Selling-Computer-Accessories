<?php
session_start();
if(isset($_SESSION['admin_access'])){
    $admin_fname = $_SESSION['admin_fname'];
    $admin_id = $_SESSION['admin_id'];

// include 'include/head.php';


include("database.php");    

    ?>



</html>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admin dashboard</title>
  
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">
<style>
.error {color: #FF0000;}
</style>
  
</head>

<body>





<?php
// define variables and set to empty values
$oldpass_Err = $newpass_Err = "";
$newpass = $oldpass  = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}





if ($_SERVER["REQUEST_METHOD"] == "POST") 

{

    if (empty($_POST["oldpass"])) 
    {
              $oldpass_Err = "Your Current Paasword is required";
    } 


    else 
    {
            $oldpass = test_input($_POST["oldpass"]);

            $check = mysqli_query($conn ," SELECT * FROM `admin` WHERE `password` = '$oldpass' "  );

            $checkoldpass = mysqli_fetch_assoc($check);


                if ($checkoldpass) 
                {

                    $newpass = test_input($_POST["newpass"]);


                            if  (empty($_POST["newpass"])) 
                               {
                                        $newpass_Err = "New Password Filed Cant be Blank!!";
                               } 


                            else{


                                  $done = mysqli_query($conn , " UPDATE `admin` SET `password`='$newpass' ");

                                  if ($done) {
                                            echo '<script language="javascript">';
                                            echo 'alert("Succesfully Password Updated ! Your New Password  : " + "'.$newpass.' ")';

                                            echo '</script>';

                                            echo "<script> document.location.href='change_pass1.php';</script>";
                                            } 
                                  else { $newpass_Err = "New Password Submission Failed !"; }


                                } 



                }

                else 
                { 

                   $oldpass_Err = "Wrong Password! Give your current passowrd !"; 

                }

    }

}
   



?>


<?php include("include/top_navbar.php")?>
<?php include("include/sidebar.php")?>
	


<div class="main-content">



<div class="container">
<h2>Change Your Paasword : </h2> <br/>

  <div class="row">
   

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

      <div class="col-md-6">


          <div class="form-group">
            <label for="exampleInputEmail">Current Passwods</label>
            <input type="text" class="form-control" name="oldpass">
            <span class="error">* <?php echo $oldpass_Err;?></span>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword">New Password </label>
            <input type="text" class="form-control"   name="newpass">
            <span class="error">* <?php echo $newpass_Err;?></span>
          </div>

            <div class="form-group">
            <input type="submit" class="btn btn-info" value="Change Password" name="submit"  >
          </div>

        
      </div>
    </form>
 

</div>




<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script  src="js/index.js"></script>




</body>

</html>



   <?php

   
    }


    else

     {
        echo "<script> document.location.href='../login.php';</script>";}
        ?>
