<?php
session_start();
if(isset($_SESSION['client_access'])){
      
      $uname = $_SESSION['uname'];
      $id = $_SESSION['u_id'];


include("database.php");    

    ?>

</html>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title><?php echo $uname; ?> dashboard</title>
  
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="../css/style.css">

  
</head>

<body>





<?php


  if(isset($_POST['submit']))
{
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$done = mysqli_query($conn , " UPDATE `user` SET `f_name`='$fname',`l_name`='$lname',`email`='$email',`phone`='$phone' WHERE `u_id` = '$id' ");

                                  if ($done) {
                                            echo '<script language="javascript">';
                                            echo 'alert("Succesfully Updated ! ")';

                                            echo '</script>';

                                            echo "<script> document.location.href='change_pass1.php';</script>";
                                            } 
                                  else { echo "<div class=\"invalid_msg\">Information Not Updated !</div>"; }


}
  else {
          echo "<div class=\"invalid_msg\">Fill All The Information !</div>";
        
       }


?>


<?php include("include/top_navbar.php")?>
<?php include("include/sidebar.php")?>
	


<div class="main-content">

  <section>
      <div id="checkout-wrapper" >
            <div id="checkform">

                <form action="" method="POST">

      <h2>Check Your Information : </h2><hr>
    
    <?php

    $queryc = mysqli_query($conn, "SELECT * FROM `user` WHERE u_id = $id");
    $rowc = mysqli_fetch_assoc($queryc);

    ?>


                    <p id="cname" class="clabel"> First Name :</p>
        <input type="text" size="60" name="fname" pattern="^[a-zA-Z\s]+$" title="only letters" value="<?= $rowc['f_name']; ?>"   required>
                    
                    <p id="cname" class="clabel">Last Name :</p>
        <input type="text" size="60" name="lname" pattern="^[a-zA-Z\s]+$" title="only letters" value="<?= $rowc['l_name']; ?>" required>
                    
                    <p id="cname" class="clabel">Email :</p>
        <input type="email" size="60" name="email" value="<?= $rowc['email']; ?>" required>

                    <p id="cname" class="clabel"> Phone :</p>
        <input type="text" size="60" name="phone" pattern="[0-9]+" title="numbers only" maxlength="11" value="<?= $rowc['phone']; ?>" required >


                    <button type="submit" name="submit">Update</button>
        
      </div>
        </div>
    </section>



  
      </div>
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
        echo "<script> document.location.href='../user_login1.php';</script>";
      }
        ?>
