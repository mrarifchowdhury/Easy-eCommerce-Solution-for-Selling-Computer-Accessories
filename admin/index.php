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
 
  <link rel="stylesheet" type="text/css" href="../employee/css/admin.css">

  <link rel="stylesheet" href="css/style.css">

  
</head>




<body>

<?php include("include/top_navbar.php");?>

<?php include("include/sidebar.php");?>
	


<div class="main-content">



<?php
 
	$query1 = $conn->query("SELECT * FROM product");
    $row1_count = mysqli_num_rows($query1);
    

    $query2 = $conn->query("SELECT * FROM category");
    $row2_count =mysqli_num_rows($query2);


    $query3 = $conn->query("SELECT sum(cost) as taka FROM `sales_info`");
    $row3 =mysqli_fetch_assoc($query3);
    $sale=$row3['taka'];
    


    $query4 = $conn->query("SELECT * FROM admin WHERE type='Employee'");
    $row4_count =mysqli_num_rows($query4);


    
    $query5 = $conn->query("SELECT * FROM user ");
    $row5_count =mysqli_num_rows($query5);


    


?>



 
    <div   style="background-color: #F2F2F2;">
        <ul id="admin-info">
            <!-- <a href="#"><li><img src="" alt=""><p>Total Visitors: <br></p></li></a> -->


            <a href="#"><li style="background-color: orange; opacity: 0.7;" ><img src="images/admin/products.png" alt=""><p>Total Products: <span><?php echo $row1_count; ?></span></p></li></a>


            <a href="#"><li  style="background-color: orange; opacity: 0.7;" ><img src="images/admin/category.png" alt=""><p>Total Categories: <span><?php echo $row2_count; ?></span></li></a>

            <a href="#"><li  style="background-color: orange; opacity: 0.7;" ><img src="images/admin/community.png" alt=""><p>Total Customers: <span><?= $row5_count ;?>  </span></li></a>

            <a href="#"><li  style="background-color: orange; opacity: 0.7;" ><img src="images/admin/dashboard.png" alt=""><p>Total Employee: <span>   <?php echo $row4_count; ?>  </span></li></a>

			<a href="#"><li  style="background-color: orange; opacity: 0.7;" ><img src="images/admin/cash.ico" alt=""><p>Earning : <span><?php echo  $sale; ?></span> TK.</li></a>

        </ul>

       
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
