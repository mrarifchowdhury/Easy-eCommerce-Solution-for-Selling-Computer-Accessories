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

  
</head>

<body>

<?php include("include/top_navbar.php")?>
<?php include("include/sidebar.php")?>
	


<div class="main-content">



<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"> <h4>   Product Details  <h4/> </div>
      <div class="panel-body">

           <div class="table-responsive">          
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Price</th>

                  <th>Image</th>
                  <th>Discount</th>
                  <th>Quantity</th>
                  <th>Earning</th>

                  <th>Sales</th>
                  <th>Catagory Name</th>

                </tr>
              </thead>
              

             
    <tbody>
    <?php
    $i = 1;
    $query1 = mysqli_query($conn, "SELECT * FROM `product` order by p_id asc");

    while ($row1 = mysqli_fetch_assoc($query1)) {




        ?>
        <tr class="item">
            <td class=" "><?php echo $row1['p_id']; ?></td>
            <td class=" "><?php echo $row1['p_name'] ; ?></td>
            <td class=" "><?php echo $row1['p_title']; ?></td>
            <td class=" "><?php echo $row1['p_status']; ?></td>
            <td class=" "><?php echo $row1['p_price']; ?></td>

            <td class=" "><img src="<?php echo $row1['p_image']; ?>" width="60px" height="50px" alt="" /></td>
            <td class=" "><?php echo $row1['p_discount']; ?></td>
            <td class=" "><?php echo $row1['p_quantity'] ; ?></td>
            <td class=" "><?php echo $row1['p_earning']; ?></td>
            <td class=" "><?php echo $row1['p_sales']; ?></td>
            <td class=" "><?php echo $row1['cat_name']; ?></td>
           
        </tr>
        <?php $i++;
    } ?>
    </tbody>



            </table>
            </div>

      </div>
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
        echo "<script> document.location.href='../login.php';</script>";}
        ?>
