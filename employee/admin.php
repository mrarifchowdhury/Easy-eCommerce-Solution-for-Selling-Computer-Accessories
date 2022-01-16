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
 
	$query1 = $conn->query("SELECT * FROM product");
    $row1_count = mysqli_num_rows($query1);
    
    $query2 = $conn->query("SELECT * FROM category");
    $row2_count =mysqli_num_rows($query2);

?>

<section>
    <div id="main-body"  style="background-color: #F2F2F2;">
        <ul id="admin-info">
            <!-- <a href="#"><li><img src="images/admin/community.png" alt=""><p>Total Visitors: <br></p></li></a> -->


            <a href="#"><li style="background-color: orange; opacity: 0.7;" ><img src="images/admin/products.png" alt=""><p>Total Products: <span><?php echo $row1_count; ?></span></p></li></a>
            <a href="#"><li  style="background-color: orange; opacity: 0.7;" ><img src="images/admin/category.png" alt=""><p>Total Categories: <span><?php echo $row2_count; ?></span></li></a>
                
            <!-- <a href="#"><li><img src="images/admin/cash.ico" alt=""><p>Total Earning: <br></p></li></a> -->
        </ul>

       
    </div>
</section>




<?php
}
else
{
echo "<script> document.location.href='../login.php';</script>";}
?>
