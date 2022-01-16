<?php
session_start();

if(isset($_SESSION['employee_access'])){
    $employee_fname = $_SESSION['employee_fname'];
    $employee_id = $_SESSION['employee_id'];

include("database.php");    

?>

<?php include("admin_header.php"); ?>
<?php include("admin_sidebar.php"); ?>




<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="../admin/css/style.css">

  
</head>

<body>




<div class="main-content">



<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"> <h4>   Customers Information  <h4/> </div>
      <div class="panel-body">

           <div class="table-responsive">          
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Full Name</th>
                  <th>Phone Numner</th>
                  <th>Username</th>
                  <th>Email</th>
                </tr>
              </thead>
              

             
    <tbody>
    <?php
    $i = 1;
    $query1 = mysqli_query($conn, "SELECT * FROM `user` order by u_id asc");

    while ($row1 = mysqli_fetch_assoc($query1)) {


        ?>
        <tr class="item">
            <td class=" "><?php echo $row1['u_id']; ?></td>
            <td class=" "><?php echo $row1['f_name']." ".$row1['l_name'] ; ?></td>
            
            <td class=" "><?php echo $row1['phone']; ?></td>
            <td class=" "><?php echo $row1['username']; ?></td>
            <td class=" "><?php echo $row1['email']; ?></td>
           
        </tr>
        <?php $i++;
    } ?>
    </tbody>



            </table>
            </div>

      </div>
    </div>






 


</div>








<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script  src="js/index.js"></script>




</body>

</html>






<?php
}
else
{
echo "<script> document.location.href='../login.php';</script>";}
?>
