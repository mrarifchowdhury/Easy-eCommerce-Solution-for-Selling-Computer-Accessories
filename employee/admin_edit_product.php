<?php session_start(); ?>
<?php include("admin_header.php"); ?>
<?php include("admin_sidebar.php"); ?>
<?php include("database.php");?>
<?php
if(isset($_GET['id']))
	{
	  $id = $_GET['id'];
	
	  if(isset($_POST['submit']))
	  { 
            $p_name = $_POST['name'];
            $p_status = $_POST['status'];
            $p_price = $_POST['price'];
            $p_discount = $_POST['discount'];
            $p_quantity = $_POST['quantity'];
            
			
			
		$query3 = $conn->query("update product set p_name='$p_name', p_status='$p_status', p_price='$p_price', p_discount='$p_discount',
			p_quantity='$p_quantity' where p_id='$id'");
	
	    if($query3)
	    {
	      header('location:add_new_product.php');
	    }
	
	 }
	 
	$query1 = $conn->query("select * from product where p_id='$id'");
	
	$row = $query1->fetch_assoc();
?>
<section>
    <div id="main-body">
	  
        <h1 id="p_header"> Update Product : </h1>

        <form action="" method="POST" id="pform" name="add-product-form" enctype="multipart/form-data">
		
            <p id="pname" class="formlabel">Product Name: </p>
            <input type="text" name="name" size="100" value="<?php echo $row['p_name']; ?>">

            <p id="catdesc" class="formlabel">Product Status:</p>
             <select name="status" >
			<?php
               echo "<option>".$row['p_status']."</option>";
                       
            ?>
			<option >Select Status</option>
			<option>Yes</option>
			<option>No</option>
			</select>

            <p id="pprice" class="formlabel">Price: </p>
            <input type="text" name="price" size="50" value="<?php echo $row['p_price']; ?>"><span>  TK</span>

            <p id="pdis" class="formlabel">Discount:  </p>
            <input type="text" name="discount" size="50" value="<?php echo $row['p_discount']; ?>"><span>  %</span>

            <p id="pqt" class="formlabel">Quantity: </p>
            <input type="text" name="quantity" size="50" value="<?php echo $row['p_quantity']; ?>">
            
           

            
            <input type="submit" name="submit" value="update" id="psubmit">
        </form>
    <?php } ?>
   
    </div> 
</section>

	
	
	
	
	
	
	
	
	
	
	
	
	
	