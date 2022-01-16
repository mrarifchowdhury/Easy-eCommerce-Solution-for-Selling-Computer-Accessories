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
if(isset($_POST['submit'])) 
{
        
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $type = "Employee";


$insert = $conn->query("INSERT INTO admin (name,email,address,username,password,type) VALUES ('$name','$email','$address','$username','$password','$type')");

if ($insert) {
     echo "<div class=\"success\">New Employee Added !</div>";
}
else
{
     echo "<div class=\"failed\"> Employee Not Added !</div>";
}


    
}
?>




<section>
    <div id="main-body">



<h1 id="p_header"> Employee Details : </h1>

  <div class="view_category">
    <table border="1">
    <tr>
    
    <th>Name</th>
    <th> Email</th>
    <th>Address</th>
    <th>Username</th>    
    <th>Edit</th>
    <th>Delete</th>
   </tr>
         
   <?php 

 $res = $conn->query("select * from admin WHERE `type` = 'Employee' ");

   while($row = $res->fetch_assoc()){ ?>

   <tr>
   
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['address'];?></td>
    <td><?php echo $row['username'];?></td>
    <td><a href="employee_edit.php?id=<?php echo $row['id'];?>"><img src="images/edit_icon.png"></a></td>
    <td><a href="employee_delete.php?id=<?php echo $row['id'];?>"><img src="images/delete_icon.png"></a></td>
   </tr>
    <?php } ?>
   </table>
   </div>

  
     <h1 id="p_header"> Add Employee : </h1>

       <form action="" method="POST" id="pform" name="add-product-form" enctype="multipart/form-data">
    
            <p id="pname" class="formlabel"> Name: </p>
            <input type="text" name="name" size="100" pattern="^[a-zA-Z\s]+$" title="only letters" placeholder="Enter Name" required>

      <p id="pname" class="formlabel" > Email: </p>
            <input type="email" name="email" size="68"  placeholder="Enter Email" required>

      <p id="pname" class="formlabel"> Address: </p>
            <input type="text" name="address" size="100" placeholder="Enter Address" required>

      <p id="pname" class="formlabel"> Username: </p>
            <input type="text" name="username" size="100" placeholder="Enter Username" required>

         <p id="pname" class="formlabel"> Password: </p>
            <input type="text" name="password" size="100" placeholder="Enter Password" value="123" required>

      
                  
            <input type="submit" name="submit" value="Add Employee" id="psubmit">
      
        </form>
   






  



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
