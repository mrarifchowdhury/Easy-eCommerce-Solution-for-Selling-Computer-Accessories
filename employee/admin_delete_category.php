<?php include("database.php"); ?>

 <?php

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$query1 = $conn->query("delete from category where c_id='$id'");
	
	if($query1)
	{
	echo"<script>alert('Are you sure')</script>";
	header('location:add_new_category.php');
	}
}
?>