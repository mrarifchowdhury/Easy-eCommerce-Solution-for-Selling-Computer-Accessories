<div class="modal fade" id="myModal<?php echo $id;?>" role="dialog">
<div class="modal-dialog    modal-lg">
    
    
    
      <!-- Modal content-->
<div class="modal-content">

<div id="printThis">        



<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title" > <img src="AR-Logo.png" class="header_title" style="width: 50px; height: 50px; margin-left: 402px;"></h4>
</div>
        
        
<div class="modal-body">
 

<h4 style=" font-family: cursive; color: blue; text-align: center;" > SALES RECEIPT  </h4><br>
	<div  style=" text-align: left; margin-left: 44px;">

Customer Name : <?php echo $row1['s_firstname']  ." ". $row1['s_lastname']  ;?> <br>

Address : <?php echo $row1['s_address'] ;?>    <br> 

City :   <?php echo $row1['city'] ;?>    <br>

Phone Number : <?php echo $row1['s_phone'] ;?>   <br>


<?php

$email99 = $row1['s_email'];

 $query3 = $conn->query("SELECT `username` FROM `user` WHERE `email` = '$email99'   ") or die();

   while($row3 = $query3->fetch_assoc()){ 

?>

Username : <?php echo $row3['username'] ;?>  <br>

<?php } ?>


Email :   <?php echo $row1['s_email'] ;?>    <br>


</div>






    
      
   
<div class="view_category">
<table border="1">
<tr>
<th>Product Name  </td>
<th>Image </th>
<th>Price </th>
<th>Discount</th>
<th>Quantity </td>
<th>Total Cost </th>
<th>Ordered Date    </th>

</tr>


<?php

$i = 1;

$querye = mysqli_query($conn, "SELECT * FROM `product` LEFT JOIN `sales_info` ON product.p_id = sales_info.p_id WHERE s_id = $id");

$queryd = mysqli_query($conn, "SELECT * FROM `sales_info` WHERE s_id = $id");

$rowd = mysqli_fetch_assoc($queryd);

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


<hr>


<table style="border: none;">


<tr>
<th>Product Recieved By :   </th>
<th>Issued By :</th>
<th></th>
<th>Delivered By : </th>
</tr>


<tr>
<th>..........................................</th>
<th>..........................................</th>
<th></th>
<th>..........................................</th>
</tr>





</table>



</div>


</div>






</div>  <!-- Until here printThis   -->


        
        
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button id="btnPrint" type="button" class="btn btn-default">Print</button>
</div>
        
        
    </div> 
    </div>
    </div>

