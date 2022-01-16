<?php 

    include("database.php");

    $id = $_REQUEST['id'];

    $image = $conn->query("SELECT * FROM product WHERE p_id = $id") or die();

    $image = $image->fetch_assoc();

    $image = $image['p_image'];

    header("Content-type: images/jpg");

    echo $image;

?>