<?php
    $server = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'ecommerce';

    $conn= new mysqli($server,$username,$password,$db) or die("Failed to connect to Database ");

   
?>