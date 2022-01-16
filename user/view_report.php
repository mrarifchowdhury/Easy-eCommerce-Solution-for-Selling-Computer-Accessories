<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admin dashboard</title>
  
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

<?php include("include/top_navbar.php")?>
<?php include("include/sidebar.php")?>
	


<div class="main-content">

  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">   <h3> Report <h3/>    </div>

      <div class="panel-body">









  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"> Report By Date </a></li>
    <li><a data-toggle="tab" href="#menu1"> Daily Report  </a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">

                                               <form action="date_between_report.php" method="GET">
                                                    
                                                     <hr /> <hr />
                                                    <table width="auto" align="center" class="">

                                                        <tr>
                                                            <td><input type="date"  class="form-control" required id="single_cal2" aria-describedby="inputSuccess2Status1" name="from_date" placeholder="From: DD-MM-YYYY" ></td><td>&nbsp;&nbsp;</td>
                                                            <td><input type="date"  class="form-control" required id="single_cal3" aria-describedby="inputSuccess2Status2" name="to_date" placeholder="To: DD-MM-YYYY" ></td><td>&nbsp;&nbsp;</td>
                                                            <td><input type="submit" class="btn btn-success" ></td>
                                                        </tr>
                                                    </table>
                                                    <hr /> <hr />
                                                </form>




    </div>


    <div id="menu1" class="tab-pane fade">



                                                <form action="daily_report.php" method="GET">
                                                     <hr /> <hr />
                                                    <table width="auto" align="center" class="">

                                                        <tr>
                                                            <td><input type="date"  class="datepicker form-control" name="date" placeholder="From: DD-MM-YYYY" ></td><td>&nbsp;&nbsp;</td>
                                                            <td><input type="submit" class="btn btn-success"></td>
                                                        </tr>
                                                    </table>
                                                    <hr /> <hr />
                                                </form>








    </div>
    
  </div>

















      </div>
    </div>



</div>








<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script  src="js/index.js"></script>




</body>

</html>
