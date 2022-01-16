<?php session_start(); ?>
<?php include("admin_header.php"); ?>
<?php include("admin_sidebar.php"); ?>
<?php include("database.php")?>

<style type="text/css" media="print">
#adminbody {
	display:none;
}
</style>

<h1 id="report"> Sales Report </h1>
<div class="sales_r">
<button type="button" style="margin-top:20px; margin-bottom:15px; padding:10px 15px;background:#3385ff;border:1px solid #3385ff;
float:right;margin-right:5%;border-radius:2px;" onclick="window.print()">PRINT</button>
<table>
<tr>
    <th>ID</td>
    <th>Product Name</th>
	<th>Image</th>
	<th>Total sales</th>
    <th>Total Earned</th>
</tr>

<?php 
    
   $query = $conn->query("SELECT * FROM product") or die();
        
        while ($row = $query->fetch_assoc())
        {
            $output = "<tr>";
			$output .= "<td>".$row['p_id']."</td>";
            $output .= "<td>".$row['p_name']."</td>";
			$output .= "<td><img src='".$row['p_image']."'></td>";
            $output .= "<td>".$row['p_sales']."</td>"; 
			$output .= "<td> ".$row['p_earning']."</td>";
            $output .= "</tr>";
            $output .= "";
            $output .= "";
            $output .= "";
            
            echo $output;
            
        }
?>  
</table>

</div>
