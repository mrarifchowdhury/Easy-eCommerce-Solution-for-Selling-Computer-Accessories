<?php include("database.php"); ?>

 <?php

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$delete = $conn->query("DELETE  FROM admin WHERE id='$id'");
	
	if($delete)
	{
	
	header('location:manage_employee.php');
	}
}
?>