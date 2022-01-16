<?php session_start(); ?>
<?php include("admin_header.php"); ?>
<?php include("admin_sidebar.php"); ?>
<?php include("database.php")?>

<style type="text/css" media="print">
#adminbody {
	display:none;
}
</style>


<h1 id="p_report"> Purchase Report </h1>
<div class="purchase_report">

<button type="button" style="margin-top:20px; margin-bottom:15px; padding:10px 15px;background:#3385ff;border:1px solid #3385ff;
float:right;margin-right:3%;border-radius:2px;" onclick="window.print()">PRINT</button>
<table>
  <tr>
    <th>S_id</th>
    <th>Name</th>
	<th>Email</th>
	<th>Phone</th>
    <th>Address</th>
	<th>City</th>
	<th>Product Name</th>
	<th>Image</th>
	<th>Price</th>
	<th>Discount</th>
	<th>Quantity</th>
	<th>Total Cost</th>
	<th>Date</th>
	
  </tr>
  

  <?php 
    $query = $conn->query("SELECT * FROM sales");
    while ($row = $query->fetch_array()) { 
	?>
	
   
  
   <?php 
	
	        $products = $conn->query("SELECT * FROM sales_info WHERE s_id=". $row['s_id']);
            while ($result = $products->fetch_assoc())
            {
                $info = $conn->query("SELECT * FROM product WHERE p_id=".$result['p_id']);
                while ($info_row = $info->fetch_assoc())
                {
 ?>  <tr>
   <td><?php echo $row['s_id'];?></td>
   <td><?php echo $row['s_firstname']." ".$row['s_lastname'];?></td>
   <td><?php echo $row['s_email'];?></td>
   <td><?php echo $row['s_phone'];?></td>
   <td><?php echo $row['s_address'];?></td>
   <td><?php echo $row['city'];?></td>
   <td><?php echo $info_row['p_name'];?></td>
   <td><img src="<?php echo $info_row['p_image']; ?>" width="60px" height="50px" alt="" /></td>
   <td><?php echo  $info_row['p_price'];?></td>
   <td><?php echo  $info_row['p_discount']."%";?></td>
   <td><?php echo $result['quantity'];?></td>
   <td><?php echo $result['cost'];?></td>
   <td><?php echo $result['date'];?></td>
				<?php } 
			}?>
	</tr>			
<?php 	}	?>
				

</table>

</div>



 
