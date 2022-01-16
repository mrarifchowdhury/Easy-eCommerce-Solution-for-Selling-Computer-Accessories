<?php include("database.php"); ?>

 <?php

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$delete = $conn->query("DELETE  FROM product WHERE p_id='$id'");
	
	if($delete)
	{
	
	header('location:add_new_product.php');
	}
}
?>