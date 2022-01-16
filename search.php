<?php include("header.php") ?>
<?php include("menu.php") ?>
<?php include("database.php")?>
<a href="all_products.php" id="all_products"> View search products</a>
<?php
	
    $server = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'ecommerce';

    $conn= new mysqli($server,$username,$password,$db) or die("Failed to connect to Database ");

   if(isset($_GET['search'])){
   $searchq = $_GET['search_name']; 
   $query = $conn->query("SELECT * FROM product WHERE p_title LIKE '%$searchq%'  ");
   
   $count = mysqli_num_rows($query);
   if ($count ==0){
   $output = "<center><div class=\"error_msg\">OPPS! No Result Found<div></center>";
   echo $output;
 }
 else{
 while($row = $query->fetch_assoc()) {
		 ?>
		 
		 <section class="clearfix">
		  <ul class="new-products">
		        <?php
                    $user_id = $row['p_id'];
                    $output = "<li>";
                    $output .= "<div class=\"product_image\"><a href=\"product_single.php?id=".$row['p_id']."\">";
                    $output .= "<center><img src='admin/".$row['p_image']."'></center></div>";
                    $output .= "<div class=\"product_desc\"><p>".$row['p_name']."</p>";
                    $output .= "</a>";
                   
                    
                    $quanity = $row['p_quantity'];
                    
                    if($row['p_discount'] > 0 )
                    {
                        $output .= "<strike>".$row['p_price']."TK</strike>";
                        $output .= "<i>Discount: ".$row['p_discount']." %</i>";
                        $output .= "<br>";
                        $discount_amount = ($row['p_discount'] * $row['p_price'])/100;
                        $cr_amount = $row['p_price'] - $discount_amount;
                        $output .= "<span id=\"original-price\">".$cr_amount." TK</span>";
                        if($quanity != "0")
                        {
                            $output .= "<span id=\"stock\">On Stock!</span></div>";
                            $output .= "<div id=\"see-details\"><a href=\"product_single.php?id=".$row['p_id']."\">Buy Now</a></div>";
                            $output .= "</li>";
                        }else {
                            $output .= "<span id=\"stock\" class=\"red\">Out Of Stock!</span></div>";
                            $output .= "<div id=\"see-details\"><a href=\"product_single.php?id=".$row['p_id']."\">Buy Now</a></div>";
                            $output .= "</li>";
                        }
                        
                    }else {
                        $output .= "<br>";
                        $output .= "<span id=\"original-price\">".$row['p_price']."TK</span>";
                        if($quanity != "0")
                        {
                            $output .= "<span id=\"stock\">On Stock!</span></div>";
                            $output .= "<div id=\"see-details\"><a href=\"product_single.php?id=".$row['p_id']."\">Buy Now</a></div>";
                            $output .= "</li>";
                        }else {
                            $output .= "<span id=\"stock\" class=\"red\">Out Of Stock!</span></div>";
                            $output .= "<div id=\"see-details\"><a href=\"product-single.php?id=".$row['p_id']."\">Buy Now</a></div>";
                            $output .= "</li>";
                        }
                    }
                    
                    echo $output;
					echo "</ul>";
					echo " <section>";
                
    }
}
}           ?>       
            
  