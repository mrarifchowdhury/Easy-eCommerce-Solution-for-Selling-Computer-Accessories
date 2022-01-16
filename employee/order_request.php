<?php
session_start();

if(isset($_SESSION['employee_access'])){
    $employee_fname = $_SESSION['employee_fname'];
    $employee_id = $_SESSION['employee_id'];

include("database.php");    

?>

<?php include("admin_header.php"); ?>
<?php include("admin_sidebar.php"); ?>





<h1 id="report"> Requested Order List </h1>




<section >
  
  <div id="main-body" >
    
      
   
    <div class="view_category">
    <table border="1">
    <tr>
    <th>Customer Name</td>
    <th>Email</th>
    <th>Status</th>
    <th>Action</th>
       
   </tr>



   <?php 

   $query = $conn->query("SELECT * FROM sales WHERE shipment_status != 'Ready For Shipment' AND shipment_status != 'Product Delivered' AND shipment_status != 'Product Recieved' order by `s_id` DESC") or die();

   while($row1 = $query->fetch_assoc()){ ?>
   <tr>
        <td><?php echo $row1['s_firstname']  ." ". $row1['s_lastname']  ;?></td>
        <td><?php echo $row1['s_email'];?></td>
        <td><?php echo $row1['shipment_status'];?></td>
        <td> 

        <form method="post">
        <input value="<?php echo $row1['s_id']; ?>" hidden name="id">
        <input value="<?php echo $row1['shipment_status']; ?>" hidden name="status">
        <button type="submit" name="change" class="btn btn-info"> Detail </button>
        </form>

        </td>
   </tr>
        <?php } ?>
   </table>
   </div>
   </div> 
</section>





<?php

if (isset($_POST['change'])) {
    $id = $_POST['id'];
    if ($_POST['status'] == 'Unseen') {
        $status = 'Not Decided';
    } 

    elseif ($_POST['status'] == 'Ready For Shipment') {
        $status = 'Ready For Shipment';
    } 

    else {
        $status = 'Not Decided';
    }

    $done = mysqli_query($conn, "UPDATE `sales` SET `shipment_status`='$status' WHERE `s_id`= '$id'");
    if ($done) {
        echo "<script> document.location.href='order_details.php?user_id=$id';</script>";
    } else {
        echo mysqli_error($con);
    }
}




?>
<?php
}
else
{
echo "<script> document.location.href='../login.php';</script>";}
?>
