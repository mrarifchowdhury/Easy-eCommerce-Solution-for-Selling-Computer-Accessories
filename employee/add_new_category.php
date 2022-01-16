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
       if(!empty($_POST['name']) && !empty($_POST['status'])) 
        {
            $c_name = $_POST['name'];
            $c_status = $_POST['status'];

            if(!$insert = $conn->query("INSERT INTO category  (c_name,c_status) VALUES ('$c_name','$c_status')" )) 
            {
               echo "<div class=\"failed\">Problem Uploading !</div>";
			   
            } 
			else 
			{
               echo "<div class=\"success\">New Category Added !</div>";
                
            }

        }
		else {
          echo "<div class=\"failed\">Fill All The Information !</div>";

        }
    }
 $result = $conn->query("select * from category ");
?>

<section>
    <div id="main-body">
        <h1 id="cat_header">Manage Category :</h1>

        <form action="#" method="POST" id="catform" name="catform" enctype="multipart/form-data">
           
            <p id="catname" class="formlabel"> Category Name: </p>
            <input type="text" name="name" placeholder="Enter Category Name" required>
            
            <p id="catdesc" class="formlabel">Category Status:</p>
            <select name="status" >
			<option>Select Status</option>
			<option>Yes</option>
			<option>No</option>
			</select>
			
			<input type="submit" name="submit" value="Add Category" id="catsubmit">
			
       </form>

   
   
   <div class="view_category">
   <table border="1">
   <tr>
		<th>ID</th>
		<th>Category Name</th>
		<th>Category Status</th>
		<th>Edit</th>
		<th>Delete</th>
   </tr>
   <?php while($row = $result->fetch_assoc()){ ?>
   <tr>
		<td><?php echo $row['c_id'];?></td>
		<td><?php echo $row['c_name'];?></td>
		<td><?php echo $row['c_status'];?></td>
		<td><a href="admin_edit_category.php?id=<?php echo $row['c_id'];?>"><img src="images/edit_icon.png"></a></td>
		<td><a href="admin_delete_category.php?id=<?php echo $row['c_id'];?>"><img src="images/delete_icon.png"></a></td>
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















 
