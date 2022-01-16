<?php
session_start();
if(isset($_SESSION['client_access'])){
      
      $uname = $_SESSION['uname'];
      $id = $_SESSION['u_id'];


include("database.php");    

    ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>User dashboard</title>
  
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
 
  <link rel="stylesheet" type="text/css" href="../admin/css/admin.css">

  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" media="all" href="../css/style.css">

  
</head>

<body>

<?php include("include/top_navbar.php");?>

<?php include("include/sidebar.php");?>
	


<div class="main-content">


<!-- ------------------ Checkout Section ---------------- -->
<?php
include("database.php");
$sql = "Select * from sales";
$res = $conn->query($sql);
while($row = $res->fetch_assoc())
?>  

<section>
<div id="thank_section">
<h1><?php echo $row['s_name'];?>Your order submitted successfully </h1>

<h1>We let you know if your order is accepted or rejected through your mail</h1></h1>
<img src="../images/thank.gif">

</div>
</section>


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
