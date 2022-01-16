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
	    $c_name = $_POST['name'];
        $c_status = $_POST['status'];
	
	    $query3 = $conn->query("update category set c_name='$c_name', c_status='$c_status' where c_id='$id'");
	
	    if($query3)
	    {
	      header('location:add_new_category.php');
	    }
	
	 }
	
	$query1 = $conn->query("select * from category where c_id='$id'");
	
	$row = $query1->fetch_assoc();
?>

  
 <section>
    <div id="main-body">
        <h1 id="cat_header">Category Manage :</h1>
        <form action="#" method="POST" id="catform" name="catform" enctype="multipart/form-data">
           
            <p id="catname" class="formlabel"> Category Name: </p>
            <input type="text" name="name" value="<?php echo $row['c_name']; ?>" />
            
            <p id="catdesc" class="formlabel">Category Status:</p>
            <select name="status" >
			<?php
               echo "<option value=\"".$row['c_status']."\">".$row['c_status']."</option>";
                       
            ?>
			<option >Select Status</option>
			<option>Yes</option>
			<option>No</option>
			</select>
			
			<input type="submit" name="submit" value="update" id="catsubmit">
       </form>
	<?php } ?>
   </div>
</section>  