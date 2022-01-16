<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BD Electric Bazar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" media="all" href="css/style.css">
	<script src="js/jquery.js"></script>  
    <script src="js/main.js"></script> 
	<link rel="shortcut icon" href="images/logo/cart.png" type="image/x-icon">
</head>

<body>

<?php include("header.php")?>
<?php include("menu.php")?>

<?php include("database.php")?>

    
<!-- ----------------- All Categories ------------------ -->

<section>
   <div class="category_section">
     <div class="category_header"><p>Browse All Category</p></div>
	 <div class="all-category">
       <ul>
           <?php
                $q = "SELECT * FROM category where c_status = 'yes'";
                $result = $conn->query($q);
                if(!$result) {
                    echo "Query Failed !";
                }

                while($row = $result->fetch_assoc()) {
                    $user_id = $row['c_id'];
					
                    $output = "<li>";
                    $output .= "<a href=\"category_product_list.php?id=".$user_id." \"> ";
                    $output .= "<p><img src='images/drop_arrow.png'>".$row['c_name']."</p>";
                    $output .= "</a>";
                    $output .= "</li>";
					echo $output;
                }
           ?>
       </ul>
	   </div>
   </div> 
</section>
  

