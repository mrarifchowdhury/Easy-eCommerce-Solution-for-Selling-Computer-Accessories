<?php include("header.php") ?>
<?php include("menu.php") ?>
<?php include("slider.php") ?>




<body>



<br><br>


<div style=" text-align:center;">
   <form action="Mail/email.php" method="post"><br><br>
    Name : <input type="text" name="name" ><br><br>

   Email : <input type="email" name="email" ><br><br>

     <textarea rows="4" cols="50" name="msg">
      
      </textarea><br><br>
	  <input type="submit" name="submit" value ="send message">
 
 </form>
 <div>
 
 
<br> 
<br> 
<br> 
<br> 
<br>
 

<?php include("footer.php") ?>
 

</body>
</html>