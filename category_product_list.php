<?php session_start(); ?>
<?php include("database.php")?>
<?php include("view_category.php")?>

<!-- -------------------- Category Products -------------------- -->
  <section class="clearfix">
      <ul class="cat-products">
            <?php
	
                global $id;

                if(isset($_GET['id']))
                {
                     $id=$_GET['id'];
                }

                $query = "SELECT * FROM product WHERE cat_name = (SELECT c_id FROM category WHERE c_id = $id) and p_status='yes'";

                $result = $conn->query($query);
                if(!$result) {
                    echo "Query Failed !";
                }

          $conn= new mysqli($server,$username,$password,$db) or die("Failed to connect to Database ");
                while($row =$result->fetch_assoc()) {
                    $user_id = $row['p_id'];
                    
                    $output = "<li>";
                    $output .= "<div class=\"product_image\"><a href=\"product_single.php?id=".$row['p_id']."\">";
                    $output .= "<center><img src='admin/".$row['p_image']."'></center></div>";
                    $output .= "<div class=\"product_desc\"><p>".$row['p_name']."</p>"; 
                    $output .= "</a>";
                   
                    
                    $quanity = $row['p_quantity'];
                    
                    if($row['p_discount'] > 0 )
                    {
                        $output .= "<strike>".$row['p_price']." TK</strike>";
                        $output .= "<i> ".$row['p_discount']." % OFF</i>";
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
                            $output .= "<div id=\"see-details\"><a href=\"product_single.php?id=".$row['p_id']."\">Buy Now</a></div>";
                            $output .= "</li>";
                        }
                    }
                    
                    echo $output;
                }
            ?>       
        </ul>
	 
    </section> 
    
   <?php include("footer.php");?>

