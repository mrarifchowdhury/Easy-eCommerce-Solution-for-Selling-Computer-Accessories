
<?php include("database.php");?>



<?php
$query2 = mysqli_query( $conn, "SELECT COUNT(s_id) as id FROM `sales` WHERE shipment_status = 'Unseen' "); 
$row2 = mysqli_fetch_assoc($query2);
//echo $row2['id'];
?>

 <section id="adminbody" class="clearfix">


        <div id="sidebar"   >
              <ul id="admin-nav"   >
                    <a href="admin.php"><li><p>Dashboard</p></li></a>
                    <a href="add_new_product.php"><li><p>Products</p></li></a>
                    <a href="add_new_category.php"><li><p>Categories</p></li></a>

                    <a href="order_request.php"><li><p>Order Request   <span class="sidemenu_span" > <?php echo $row2['id'];?> </span>    </p> </li></a>
                    <a href="customers_details.php"><li><p>Customer Information</p></li></a>
                    <a href="Shippping_info.php"><li><p>View Shippping Info</p></li></a>
                    <a href="Delivered_Shipping_Info.php"><li><p>Delivered Shipment List </p></li></a>
                    
                    <!-- <a href="Shippping_info.php"><li><p>Customer Feedback</p></li></a>
                    <a href=""><li><p>Customer Claim </p></li></a> -->






  <!--                   <a href="sales_report.php"><li><p>Sales Status</p></li></a>
                    <a href="purchase_report.php"><li><p>Purchase Report</p></li></a> -->


					          <a href="admin_logout.php"><li><p>Log Out</p></li></a>
             </ul>
       </div> 
 </section>