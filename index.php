<?php session_start(); ?>
<?php include("header.php") ?>
<?php include("menu.php") ?>
<?php include("slider.php") ?>
<?php include("database.php")?>


<!----------------------------------------All Products---------------------------->
 <a href="all_products.php" id="all_products"> View All Products</a>
    
    <section class="clearfix">
    
        <ul class="new-products">
           <?php
                $query = "SELECT * FROM product ORDER BY p_id DESC ";
                $result = $conn->query($query);
                if(!$result) {
                    echo "Query Failed !";
                }

                while($row = $result->fetch_assoc()) {
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
                }
            ?>       
            
        </ul>
        
    </section>

</div>
<?php include("footer.php") ?>

</body>
</html>