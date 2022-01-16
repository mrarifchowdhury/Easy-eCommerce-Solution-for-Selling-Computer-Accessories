<html>
<head>
<link rel="stylesheet" media="all" href="../css/style.css">
<link rel="stylesheet" media="all" href="css/admin.css">

</head>
<body>
   


<?php session_start(); ?>


<?php include("admin_header.php"); ?>
<?php include("admin_sidebar.php"); ?>
<?php include("database.php")?>

<?php $user_id = $_GET['user_id']; ?>







<h1 id="report"> Requested Order Detail </h1>




<section > 
<div id="main-body" >
    
  
    <!-- ------------------ Customer Order Details ---------------- -->


<section>
<div id="checkout-wrapper">


            
    
<?php

$queryc = mysqli_query($conn, "SELECT * FROM `sales` WHERE s_id = $user_id");


$rowc = mysqli_fetch_assoc($queryc);




?>






    <div id="checkform"   ">

  
            <h2> Customer Details  : </h2><hr>


                    <p id="cname" class="clabel"> First Name :</p>
                    <input type="text" size="60" name="fname"  value="<?= $rowc['s_firstname']; ?>"  >
                    
                    <p id="cname" class="clabel"> Last Name :</p>
                    <input type="text" size="60" name="lname" pattern="[A-Za-z]+" title="only letters" value="<?= $rowc['s_lastname']; ?>" >
                    
                    <p id="cname" class="clabel"> Email :</p>
                    <input type="email" size="60" name="email" value="<?= $rowc['s_email']; ?>">

                    <p id="cname" class="clabel"> Phone :</p>
                    <input type="text" size="60" name="phone" pattern="[0-9]+" title="numbers only" maxlength="11" value="<?= $rowc['s_phone']; ?>"  >


                    <p id="cname" class="clabel"> Address :</p>
                    <input type="text" size="60" name="phone"  value="<?= $rowc['s_address']; ?>"  >


                    <p id="cname" class="clabel"> City  :</p>
                    <input type="text" size="60" name="phone"  value="<?= $rowc['city']; ?>"  >
    
               
    </div>





             

<?php

$i = 1;

$querye = mysqli_query($conn, "SELECT * FROM `product` LEFT JOIN `sales_info` ON product.p_id = sales_info.p_id WHERE s_id = $user_id");

$queryd = mysqli_query($conn, "SELECT * FROM `sales_info` WHERE s_id = $user_id");

$rowd = mysqli_fetch_assoc($queryd);

?>




                    <div class="purchase_report"    >     

                    <h2> Ordered Product Details  : </h2>  <hr>

                    <table >             

                                        <tr>
                                        
                                        <td> <p id="cname" class="clabel"> Product Name         </p></td>
                                        <td> <p id="cname" class="clabel"> Image                </p></td>
                                        <td> <p id="cname" class="clabel"> Price                </p></td>
                                        <td> <p id="cname" class="clabel"> Discount             </p></td>
                                        <td> <p id="cname" class="clabel"> Quantity             </p></td>
                                        <td> <p id="cname" class="clabel"> Total Cost           </p></td>
                                        <td> <p id="cname" class="clabel"> Ordered Date                 </p></td>

                                        </tr>

                    <?php   

                    while ($rowe = mysqli_fetch_assoc($querye)) {   {   

                    ?>

                                        <tr >
                                        
                                        <td> <?= $rowe['p_name']; ?></td>  
                                        <td> <img src="<?php echo $rowe['p_image']; ?>" width="100px" height="90px" alt="" /> </td>  
                                        <td> <?= $rowe['p_price']; ?></td>
                                        <td> <?= $rowe['p_discount']; ?></td>

                    <?php    }     ?>

                                        
                                        <td> <?= $rowd['quantity']; ?></td>
                                        <td> <?= $rowd['cost']; ?></td>
                                        <td> <?= $rowd['date']; ?></td>
                                        </tr>



                    <?php   $i++;   }   ?>

                                
                                 
                    </table>

                    </div>



<div id="checkform"   >



        <form method="post">
        <input value="<?php echo $rowc['s_id']; ?>" hidden name="id">
        <input value="<?php echo $rowc['shipment_status']; ?>" hidden name="status">
        <button type="submit" name="change">Ready For Shipment</button>

        </form>




                    

      


</div>

</div>
</section>

</div> 
</section>









<?php

if (isset($_POST['change'])) {
    $id = $_POST['id'];

    if ($_POST['status'] == 'Not Decided') {
        $status = 'Ready For Shipment';
    } 

    elseif ($_POST['status'] == 'Ready For Shipment') {
        $status = 'Ready For Shipment';
    } 

    else {
        $status = 'Ready For Shipment';
    }

    $done = mysqli_query($conn, "UPDATE `sales` SET `shipment_status`='$status' WHERE `s_id`= '$id'");
    if ($done) {
        echo "<script> document.location.href='order_request.php';</script>";
    } else {
        echo mysqli_error($con);
    }
}

?>