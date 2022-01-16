<html>
<head>
<link rel="stylesheet" media="all" href="css/style.css">
</head>
<body>
   <div class="checkout_header"   style="  background: #F2F2F2; box-shadow: 0px 4px 6px -5px #000;">
		 <div class="checkout_left"><h1>Checkout Process</h1></div>
		 <div class="checkout_right"><a href="user_logout.php"><img src="images/logout.png"><br>Logout</a></div>
	  </div>
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
		   <img src="images/thank.gif">
            
        </div>
    </section>
 </body>
</html> 
   

