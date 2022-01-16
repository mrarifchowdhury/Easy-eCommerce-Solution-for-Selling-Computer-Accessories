<?php
session_start();
if(isset($_SESSION['admin_access'])){
    $admin_fname = $_SESSION['admin_fname'];
    $admin_id = $_SESSION['admin_id'];

// include 'include/head.php';


include("database.php");    

    ?>




<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admin dashboard</title>
  
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="../employee/css/admin.css">

</head>

<body>

<?php include("include/top_navbar.php")?>
<?php include("include/sidebar.php")?>
  


<div class="main-content">


<?php
if(isset($_GET['id']))
  {
    $id = $_GET['id'];
  
    if(isset($_POST['submit']))
    { 


            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            
      
      
    $query3 = $conn->query("update admin set name='$name', email='$email', address='$address', username='$username',
      password='$password' where id='$id'");
  
      if($query3)
      {
        
            echo '<script language="javascript">';
            echo 'alert("Succesfully  Updated !")';

            echo '</script>';

            echo "<script> document.location.href='manage_employee.php';</script>";

      }
  
   }
   
  $query1 = $conn->query("select * from admin where id='$id'");
  
  $row = $query1->fetch_assoc();
?>
<section>
    <div id="main-body">
    
        <h1 id="p_header"> Update Product : </h1>

       

       <form action="" method="POST" id="pform" name="add-product-form" enctype="multipart/form-data">
    
            <p id="pname" class="formlabel"> Name: </p>
            <input type="text" name="name" size="100" pattern="^[a-zA-Z\s]+$" title="only letters" value="<?php echo $row['name']; ?>"    required>

      <p id="pname" class="formlabel" > Email: </p>
            <input type="email" name="email" size="68"  value="<?php echo $row['email']; ?>" required>

      <p id="pname" class="formlabel"> Address: </p>
            <input type="text" name="address" size="100" value="<?php echo $row['address']; ?>" required>

      <p id="pname" class="formlabel"> Username: </p>
            <input type="text" name="username" size="100" value="<?php echo $row['username']; ?>" required>

         <p id="pname" class="formlabel"> Password: </p>
            <input type="text" name="password" size="100" value="<?php echo $row['password']; ?>" required>

      
                  
            <input type="submit" name="submit" value="Update" id="psubmit">
      
        </form>




    <?php } ?>
   
    </div> 
</section>

  
  
  
  
  

 


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
