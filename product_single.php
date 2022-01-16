<?php session_start(); ?>
<?php include("database.php")?>
<?php include("header.php")?>
<?php include("menu.php")?>
<?php
    global $id;

    if(isset($_GET['id']))
    {
         $id=$_GET['id'];
    }

     $query = "SELECT * FROM product WHERE p_id = $id";
     $result =$conn->query($query);

    if(!$result) {
        echo "Query Failed !";
    }
?>
<!-- ----------------Product Single Showcase ---------------- -->
    <section class="single-product clearfix">
       <?php
            while($row = $result->fetch_assoc()) {
                $user_id = $row['p_id'];
                
                $output = "<div class=\"product-left\">";
                $output .= "<center><img src ='admin/".$row['p_image']."' /></center>";
                $output .= "</div>";
                $output .= "<div class=\"product-right\">";
                $output .= "<h1>".$row['p_name']."</h1><hr>";
              
                
                if($row['p_discount'] > 0)
                {
                    $output .= "<p id=\"discount\">Discount: ".$row['p_discount']."% </p><p id=\"old-price\"><strike>Price:".$row['p_price']." TK</strike></p>";
                    $discount_amount = ($row['p_discount'] * $row['p_price'])/100;
                    $cr_amount = $row['p_price'] - $discount_amount;  
                    $output .= "<p id=\"new-price\">Price:".$cr_amount."TK </p><br><p><span id=\"quantityno\">Units in Stock: <i>".$row['p_quantity']."</i></span></p>";
                    
                    if($row['p_quantity'] > 0)
                    {
                     
                        $output .= "<a href='shopping-cart.php?add=".$row['p_id']."' class=\"add-to-cart\">Add To Cart</a>";
                        $output .= "</div>";
                        $output .= "</section>";


                    } else {
                        $output .= "<p id=\"stock-off\">Out of Stock</p>";
                        $output .= "</div>";
                        $output .= "</section>";
                    }
                    
                } else {
                    $output .= "<p id=\"new-price\">Price: ".$row['p_price']." TK</p><br><p><span id=\"quantityno\">Units in Stock: <i>".$row['p_quantity']."</i></span></p>";
                    
                    if($row['p_quantity'] > 0)
                    {
                      
                        $output .= "<a href='shopping-cart.php?add=".$row['p_id']."' class=\"add-to-cart\">Add To Cart</a>";
                        $output .= "</div>";
                        $output .= "</section>";


                    } else {
                        $output .= "<p id=\"stock-off\">Out of Stock</p>";
                        $output .= "</div>";
                        $output .= "</section>";
                    }
                }
                
                
                
                echo $output;
                
            }
        ?>
  <?php include("footer.php");?>