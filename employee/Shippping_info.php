<?php
session_start();

if(isset($_SESSION['employee_access'])){
    $employee_fname = $_SESSION['employee_fname'];
    $employee_id = $_SESSION['employee_id'];

include("database.php");    

?>


<?php include("admin_header.php"); ?>
<?php include("admin_sidebar.php"); ?>

<?php include("bootstrapcss.php")?>




<h1 id="report"> Shipping Information </h1>




<section >
  
  <div id="main-body" >
    
      
   
    <div class="view_category">
    <table border="1">
    <tr>
    <th>Customer Name</td>
    <th>Email</th>
    <th>Ordered Date</th>
    <th>Status</th>
    <th>Action</th>
    <th>Shipment Status</th>
       
   </tr>



   <?php 

   $query = $conn->query("SELECT * FROM sales WHERE shipment_status = 'Ready For Shipment' order by `s_id` DESC") or die();

   while($row1 = $query->fetch_assoc()){ ?>


   <tr>
        <td><?php echo $row1['s_firstname']  ." ". $row1['s_lastname']  ;?></td>
        <td><?php echo $row1['s_email'];?></td>
        
<?php      

$id = $row1['s_id'];

$query2 = $conn->query("SELECT * FROM `sales_info` WHERE `s_id` = '$id'  ") or die();     

$row2 = $query2->fetch_assoc() ;  

?>

        <td><?php echo $row2['date'];?></td>


        <td><?php echo $row1['shipment_status'];?></td>
        

<td>

<button type="button"  class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal<?php echo $id;?>">Details</button>

<!-- Modal Start-->

<?php include("receipt.php")?>

<!-- Modal Finish-->

</td>
 
  
       
       <td> 

        <form method="post">
        <input value="<?php echo $row1['s_id']; ?>" hidden name="id">
        <input value="<?php echo $row1['shipment_status']; ?>" hidden name="status">
        <button type="submit" name="changes" class="btn btn-info"> Product Delivered </button>
        </form>

        </td>








   </tr>
        <?php } ?>
   </table>
   </div>
   </div> 
</section>














<?php

if (isset($_POST['changes'])) {
    $id = $_POST['id'];
    if ($_POST['status'] == 'Ready For Shipment') {
        $status = 'Product Delivered';
    } 

    elseif ($_POST['status'] == 'Product Delivered') {
        $status = 'Product Delivered';
    } 

    else {
        $status = 'Product Delivered';
    }

    $done = mysqli_query($conn, "UPDATE `sales` SET `shipment_status`='$status' WHERE `s_id`= '$id'");
    if ($done) {
        echo "<script> document.location.href='Delivered_Shipping_Info.php';</script>";
    } else {
        echo mysqli_error($con);
    }
}

?>




<script type="text/javascript">
  

document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}



</script>



<?php
}
else
{
echo "<script> document.location.href='../login.php';</script>";}
?>








