
<?php include("database.php"); ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title><?php echo $uname;?> dashboard</title>
  
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
 
  <link rel="stylesheet" type="text/css" href="../admin/css/admin.css">

  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" media="all" href="../css/style.css">

  
</head>



<body>



<?php include("include/top_navbar.php"); ?>




<?php include("include/sidebar.php"); ?>







<div class="main-content">





<!-- .....................==============Checkout Process Start===========........................ -->

<div class="checkout_header"   style="  background: #F2F2F2; box-shadow: 0px 4px 6px -5px #000;">
<div class="checkout_left"><h1>Checkout Process</h1></div>
</div>





<?php


   if(isset($_POST['submit'])){


        if(!empty($_POST['fname'])&& !empty($_POST['lname']) && !empty($_POST['email'])&& !empty($_POST['phone'])&& !empty($_POST['address'])&& !empty($_POST['city']  && !empty($_SESSION['total']) )
        && !empty($_POST['option']))
        {
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $city = $_POST['city'];
          $date = date("y-m-d");
          $option = $_POST['option'];
            
          if($option == "Cash")
          {
            $bkash = "Not Needed";
          } 
          else
          {
          $bkash = $_POST['bkash'];
          }

          $total = 0;
             
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

                        $get = $conn->query('SELECT * FROM product WHERE p_id='.$id) or die();

                        while($get_row = $get->fetch_assoc())
                        {
                            $sub = $get_row['p_price'] * $value;
                            $tub = $get_row['p_price'] * $value;
                            
                                if($get_row['p_discount'] > 0)
                                {
                                    $discount_amount = ($get_row['p_discount'] * $sub)/100;
                                    $sub = $sub - $discount_amount;
                                }
                                else {
                                    $discount_amount = 0;
                                }

                                echo $total += $sub; 
                            
                            
                           //Updating Product Information
                            $new_quantity = $get_row['p_quantity'] - $value;
                            $earning = $get_row['p_earning'] + $sub;
                            $sale = $get_row['p_sales'] + $value;
                            
                            $update = $conn->query("UPDATE product SET p_quantity ='$new_quantity', p_earning ='$earning', p_sales ='$sale' WHERE p_id =$id");
                            
                            //Updating sales_info Table
                            $sid = 0;
                            $sale_products = $conn->query("INSERT INTO sales_info SET s_id='$sid',p_id='$id',quantity='$value',cost='$total',p_option='$option',bkash='$bkash',date='$date'");
                            
                        }
                        
                    }
                }
            }
            
            //Inserting Buyer Data
            $query = $conn->query("INSERT INTO sales  
            (s_firstname,s_lastname,s_email,s_phone,s_address,city,s_cost) 
            VALUES ('$fname','$lname','$email','$phone', '$address','$city','$total')") or die();
            
            
           
       
            //Updating sales_info owner
            $last = $conn->query("SELECT s_id FROM sales ORDER BY s_id DESC LIMIT 1");
            $last_row = $last->fetch_assoc() or die();
            $last_id = $last_row['s_id'];
           
            
            foreach($_SESSION as $name => $value)
            {
                if($value > 0) {
                    if(substr($name, 0, 5) == 'cart_') {

                            $id = substr($name, 5, (strlen($name)-5));
                
                            $owner = $conn->query("UPDATE sales_info SET s_id ='$last_id' WHERE s_id =0 ");

                    }       
                }
            }
         
            
             $_SESSION['cart_'.$id] = '0';
            
            $_SESSION['total'] = "0" ;
            
            header('Location: user/thank-you.php');             
                            
        
        }


          elseif (  empty($_SESSION['total'])  ) {
          echo "<div class=\"invalid_msg\">Your Cart Is Empty. Add to cart a Product and place order !</div>";
          }


          else {
          echo "<div class=\"invalid_msg\">Fill All The Information !</div>";
          }
        
}


    
?>
   
    <!-- ------------------ Checkout Section ---------------- -->
   <section>
      <div id="checkout-wrapper">
            <div id="checkform">

                <form action="checkout.php" method="POST">
                 
                
                 <h2 style="color: green;">Total Payment : <?php echo $totaltaka;?> TK </h2> 
                    
                    <br>


                 <h2>Check Your Information : </h2><hr>
    
    <?php

    $queryc = mysqli_query($conn, "SELECT * FROM `user` WHERE u_id = $id");
    $rowc = mysqli_fetch_assoc($queryc);

    ?>


                    <p id="cname" class="clabel"> First Name :</p>
                    <input type="text" size="60" name="fname" pattern="^[a-zA-Z\s]+$" title="only letters" value="<?= $rowc['f_name']; ?>" >
                    
                    <p id="cname" class="clabel">Last Name :</p>
                    <input type="text" size="60" name="lname" pattern="^[a-zA-Z\s]+$" title="only letters" value="<?= $rowc['l_name']; ?>" >
                    
                    <p id="cname" class="clabel">Email :</p>
                    <input type="email" size="60" name="email" value="<?= $rowc['email']; ?>">

                    <p id="cname" class="clabel"> Phone :</p>
                    <input type="text" size="60" name="phone" pattern="[0-9]+" title="numbers only" maxlength="11" value="<?= $rowc['phone']; ?>"  >

                    <br><br><br>

                 <h2>Billing Address </h2><hr>
                



                    <p id="cname" class="clabel"> Address :</p>
                    <textarea name="address" id="tid" cols="64" rows="3" wrap="soft" ></textarea>

                    <p id="cname" class="clabel"> City :</p>
                    <input type="text" size="60" name="city" pattern="[A-Za-z]+" title="only letters" ><br><br>
                
                    
                    <p id="cname" class="clabel"> Payment Type :</p>
           
                    <select name="option" onchange="getComboA(this)" id="">
                    <option> Select Payment Type </option>
                    <option value="Cash"> Hand Cash</option>
                    <option value="Bkash"> Bkash </option>
                    </select>
                        
                
                <div class="form-group bikaash" style="display:none;" id="bks">
                     

                    <p><span>Please Send <?php echo $totaltaka;?> TK to Our Merchant Account Number 01888888888</span></p>
                    <p id="cname" class="clabel"> Bkash Transection ID :</p>
                    <input type="text" size="60" name="bkash" pattern="[0-9]+" title="numbers only" >
                    
                </div>

                
                <div class="form-group caash" style="display:none;" id="cash">

                
                <p><span> Added Delivery Charge 150 Tk (inside Dhaka Only)</span></p>
                   
                
                <p><span> Total Payment : ( <?php echo $totaltaka;?> + 150 ) TK = <?php echo $totaltaka+150;?> TK </span></p>

                </div>
                    
            
                    <button type="submit" name="submit">Place Order</button>

                </form>
                
               
            </div>
        </div>
    </section>






<script>

function getComboA(sel) {
var value = sel.value; 
if(value=="Bkash"){
document.getElementById("bks").style.display = '';
 $('.caash').hide();

}else{
$('.bikaash').hide();
document.getElementById("cash").style.display = '';
}


}



</script>







<!-- .....................============== Checkout Process Fininsh ===========........................ -->




</div>








<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script  src="js/index.js"></script>




</body>



</html>