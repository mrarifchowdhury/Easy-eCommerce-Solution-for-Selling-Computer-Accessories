
<?php 

session_start();

if (isset($_SESSION['client_access'])){
$uname = $_SESSION['uname'];
$id = $_SESSION['u_id'];




            if (isset($_SESSION['total'])){


            $totaltaka = $_SESSION['total'];

            }

            else
            {

            $totaltaka = "0";

            }



?>

<?php include("database.php"); ?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title><?php echo $uname;?>  dashboard</title>
  
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
 
  <link rel="stylesheet" type="text/css" href="../admin/css/admin.css">

  <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

<?php include("include/top_navbar.php");?>

<?php include("include/sidebar.php");?>
	


<div class="main-content">


       
    </div>








<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script  src="js/index.js"></script>




</body>

</html>


<?php

}


else 

{
    echo "<script> document.location.href='../user_login1.php';</script>";
}

?>