<?php
session_start();
if(isset($_SESSION['admin_access']))

{
    $admin_fname = $_SESSION['admin_fname'];
    $admin_id = $_SESSION['admin_id'];

include("database.php");  


$fromdate = date_format(date_create($_GET['from_date']), "Y-m-d");
$todate = date_format(date_create($_GET['to_date']), "Y-m-d");

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


<h1> Report From <?= $fromdate ?> To <?= $todate ?> </h1>

<br>
<table class="table table-bordered ">
  <tr>
    <th>Ordered Date</th>
 
    <th>Name</th>
    <th>Email & Phone</th>

    <th>Address</th>
    <!-- <th>City</th> -->
    <th>Product Name</th>
    <th>Image</th>
    <th>Price</th>
    <th>Discount</th>
    <th>Quantity</th>
    <th>Total Cost</th>
    
    
  </tr>
  

  <?php 
 
 $i = 1;
 $sum_loan = 0;
 $total_quantity = 0;

$checkdate = $conn-> query("SELECT * FROM sales_info WHERE `date` BETWEEN '$fromdate' AND '$todate' order by id asc");

while ($cdrow = $checkdate->fetch_array()) { 

    $query = $conn->query("SELECT * FROM sales WHERE s_id=". $cdrow['s_id']);
    while ($row = $query->fetch_array()) { 
    ?>
    
   
  
   <?php 
    
            $products = $conn->query("SELECT * FROM sales_info WHERE s_id=". $row['s_id']);
            while ($result = $products->fetch_assoc())
            {
                $info = $conn->query("SELECT * FROM product WHERE p_id=".$result['p_id']);
                while ($info_row = $info->fetch_assoc())
                {
 ?> <tr>
    <td><?php echo $result['date'];?></td>
 
   <td><?php echo $row['s_firstname']." ".$row['s_lastname'];?></td>
   <td><?php echo $row['s_email']."<br>".$row['s_phone']; ?></td>
 
   <td><?php echo $row['s_address'];?></td>
   <!-- <td><?php echo $row['city'];?></td> -->
   <td><?php echo $info_row['p_name'];?></td>
   <td><img src="<?php echo $info_row['p_image']; ?>" width="60px" height="50px" alt="" /></td>
   <td><?php echo  $info_row['p_price'];?></td>
   <td><?php echo  $info_row['p_discount']."%";?></td>
   <td><?php echo $result['quantity'];?></td>
   <td><?php echo $result['cost'];?></td>
   




<?php }  

$sum_loan = $sum_loan + $result['cost'];
$total_quantity = $total_quantity + $result['quantity'];
$i++;

}  ?>
    
</tr>           
<?php   } }  ?>
                

</table>




<h2> Total Sell : <?= $sum_loan ?> TK </h2>



<h2> Total Item Sold : <?= $total_quantity ?>  </h2>






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

