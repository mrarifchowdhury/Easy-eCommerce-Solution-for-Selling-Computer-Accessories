<?php session_start(); ?>
<?php include("header.php")?>
<?php include("menu.php")?>
<?php include("database.php")?>

<?php

    if(isset($_GET['add'])) 
    {
        $quantity = $conn->query('SELECT p_id,p_quantity FROM product WHERE p_id='. $_GET['add']) or die();
        
        if(empty($_SESSION['cart_'.$_GET['add']]) == true)
        {
            $_SESSION['cart_'.$_GET['add']] = '0';
        }
        
        while($quantity_row = $quantity->fetch_assoc())
        {
            if($quantity_row['p_quantity'] != $_SESSION['cart_'.$_GET['add']]) {
                $_SESSION['cart_'.$_GET['add']] += '1';
                $_SESSION['count'] = 0;
            }
        }
        
        header('Location: shopping-cart.php');
    }


    if(isset($_GET['remove']))
    {
        $_SESSION['cart_'.$_GET['remove']] --;
        
        header('Location: shopping-cart.php');
    }

    if(isset($_GET['delete']))
    {
        $_SESSION['cart_'.$_GET['delete']] = '0';
        
        header('Location: shopping-cart.php');
    }
?>


<h1 id="cart_header">Shopping Cart </h1>

<?php
    function cart ()
    {
        $count = 0;
        $total = 0;
        $output = "<section class=\"cart_table\">";
       
        $output .= "<table border='1'>";
		$output .= "<tr>";
		$output .= "<td> Name</td>";
		$output .= "<td> Image</td>";
	    $output .= "<td> Quantity</td>";
		$output .= "<td> Available</td>";
		$output .= "<td> Price</td>";
		$output .= "<td> Discount</td>";
		$output .= "<td> Total</td>";
		$output .= "<td>Remove</td>";
		$output .= "</tr>";
		
    $server = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'ecommerce';

    $conn= new mysqli($server,$username,$password,$db) or die("Failed to connect to Database ");
        
		foreach($_SESSION as $name => $value)
        {
            if($value > 0) {

                if(substr($name, 0, 5) == 'cart_') {
                    
                    $id = substr($name, 5, (strlen($name)-5));
                    
                    $get = $conn->query('SELECT * FROM product WHERE p_id='.$id) ;
                    
                    
                    while($get_row = $get->fetch_assoc())
                    {
                        $sub = $get_row['p_price'] * $value;
                        $tub = $get_row['p_price'] * $value;
                        
                       
                        $count++;
                        $output .= "<tr>";
                        $output .= "<td>".$get_row['p_name']."</td>";
                        $output .= "<td><img id=\"cart-image\" src='admin/".$get_row['p_image']."'</td>";
                        $output .= "<td>".$value."<br><br>";

						$output .= '<a class="sminus" href="shopping-cart.php?remove='.$id.'">[-]</a>';
                        $output .= '<a class="splus" href="shopping-cart.php?add='.$id.'">[+]</a></td>';

                        $output .= "<td> ".$get_row['p_quantity']."</td>";
						$output .= "<td> ".$get_row['p_price']." TK</td>";
				        if($get_row['p_discount'] > 0)
                        {
                            $discount_amount = ($get_row['p_discount'] * $sub)/100;
                            $sub = $sub - $discount_amount;
                            $output .= "<td> ".$get_row['p_discount']." %</td>";
							
                        }
                        else {
                            $discount_amount = 0;
							$output .= "<td>0%</td>";
							
                        }
                      
                       
                       
                        
                        $output .= "<td>".$sub." TK</td>";
                     
                       
                       
                        $output .= '<td><a class="sdelete" href="shopping-cart.php?delete='.$id.'">[Remove]</a></td>';
                       
                        $output .= "</tr>";
						
                        $output .= "";
                        
                        $total += $sub;
                        
                    }

                }
                
                
                
            }
        }
         $output .= "</table>";
        
        if($total == 0)
        {
            $empty = "<div id=\"emptycart\"> ";
            $empty .= "<p> Your Cart Is Empty ! </p>";
            $empty .= "</div>";
            
            echo $empty;
        }
        else {
            $output .= "<p id=\"grant_total\"> Total : <span>".$total." TK</span></p>";
            
            $output .= "<a href=\"checkout.php\" id=\"continue-to-checkout\">Checkout</a>";
			$output .= "<a href=\"all_products.php\" id=\"continue-to-checkout\">Continue Shopping</a>";
        
        
           
            $output .= "</div>";
            $output .= "</section>";

                echo $output;
        }
        
        
        $_SESSION['count'] = $count;

        $_SESSION['total'] = $total;
    }


cart();
?>
