<?php
session_start();

if(isset($_SESSION['employee_access'])){
    $employee_fname = $_SESSION['employee_fname'];
    $employee_id = $_SESSION['employee_id'];

include("database.php");    

?>

<?php include("admin_header.php"); ?>
<?php include("admin_sidebar.php"); ?>


<?php 
    if(isset($_POST['submit'])) 
     {
        if(!empty($_POST['name']) && !empty($_POST['status']) && !empty($_POST['price']) && !empty($_POST['quantity']) && !empty($_POST['category'])
		&& !empty($_FILES['image']['tmp_name']))
        {
            $p_name = $_POST['name'];
            $p_status = $_POST['status'];
			$p_title = $_POST['title'];
            $p_price = $_POST['price'];
            $p_discount = $_POST['discount'];
            $p_quantity = $_POST['quantity'];
            $p_category = $_POST['category'];
			$source=$_FILES['image']['tmp_name'];
            $name=$_FILES['image']['name'];
            $dest='images/product/'.$name;
            move_uploaded_file($source,$dest);
			
			if(!is_numeric($p_price)){
				echo "<div class=\"failed\">Enter Correct Price Value!</div>";
			}
			else if(!is_numeric($p_discount)){
				echo "<div class=\"failed\">Enter Correct discount Value!</div>";
			}
			else if(!is_numeric( $p_quantity)){
				echo "<div class=\"failed\">Enter Correct Quantity Value!</div>";
			}
			
		    else{
				
			    if(!$insert = $conn->query("INSERT INTO product (p_name,p_status,p_title,p_price,p_discount,p_quantity,p_earning,p_sales,cat_name,p_image) 
                VALUES ('$p_name','$p_status','$p_title','$p_price','$p_discount','$p_quantity',0,0,'$p_category','$dest')")) 
                {
                    echo "<div class=\"failed\">Problem In Uploading !</div>";
                }
			    else 
			    {
                    echo "<div class=\"success\">New Product Added !</div>";
                
                }
		      }

        }
    }
	 $res = $conn->query("select * from product ");
?>

<section>
    <div id="main-body">
	
	   <h1 id="p_header"> Manage Product : </h1>

       <form action="" method="POST" id="pform" name="add-product-form" enctype="multipart/form-data">
		
            <p id="pname" class="formlabel">Product Name: </p>
            <input type="text" name="name" size="100" placeholder="Enter Product Name" required>

            <p id="catdesc" class="formlabel">Product Status:</p>
            <select name="status" >
			<option>Select Status</option>
			<option>Yes</option>
			<option>No</option>
			</select>
			
		    <p id="ptitle" class="formlabel">Title: </p>
            <input type="text" name="title" size="50" placeholder="Enter Product title" required>
			
            <p id="pprice" class="formlabel">Price: </p>
            <input type="text" name="price" size="50" placeholder="Enter Product Price" required><span>  TK</span>

            <p id="pdis" class="formlabel">Discount:  </p>
            <input type="text" name="discount" size="50" placeholder="Discount Rate" required><span>  %</span>

            <p id="pqt" class="formlabel">Quantity: </p>
            <input type="text" name="quantity" size="50" placeholder="No of Product" required>
            
            <p id="pcat" class="formlabel">Select Category: </p>
             <select name="category">
			 <option> Select Category</option>
                 <?php
                    $query = "SELECT * FROM category";
                    $result = $conn->query($query);
                    if($result) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='$row[c_id]'>".$row['c_name']."</option>";
                        }
                    } else {
                        echo "Query Faild !";
                    }
                 ?>
				 
             </select>

            <p id="ppic" class="formlabel">Product Picture: </p>
            <input type="file" name="image" placeholder="Select An Image" accept="image/*" required>
            
            <input type="submit" name="submit" value="Add New Product" id="psubmit">
			
        </form>
   
    <div class="view_category">
    <table border="1">
    <tr>
		<th>ID</th>
		<th>Product Name</th>
		<th> Status</th>
		<th>Price</th>
		<th>Discount</th>
		<th>Quantity</th>
		<th>Category</th>
		<th>Image</th>
		<th>Edit</th>
		<th>Delete</th>
   </tr>
   <?php while($row = $res->fetch_assoc()){ ?>
   <tr>
		<td><?php echo $row['p_id'];?></td>
		<td><?php echo $row['p_name'];?></td>
		<td><?php echo $row['p_status'];?></td>
		<td><?php echo $row['p_price'];?></td>
		<td><?php echo $row['p_discount'];?>%</td>
		<td><?php echo $row['p_quantity'];?></td>
		<td><?php echo $row['cat_name'];?></td>
		<td><img src="<?php echo "$row[p_image]"; ?>" width="80" height="50" alt="" /></td>
		<td><a href="admin_edit_product.php?id=<?php echo $row['p_id'];?>"><img src="images/edit_icon.png"></a></td>
		<td><a href="admin_delete_product.php?id=<?php echo $row['p_id'];?>"><img src="images/delete_icon.png"></a></td>
   </tr>
		<?php } ?>
   </table>
   </div>
   </div> 
</section>



<?php
}
else
{
echo "<script> document.location.href='../login.php';</script>";}
?>
