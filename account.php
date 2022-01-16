<?php

 session_start();
  if(!isset($_SESSION['lopon'])){
	echo"<script>location.href='user_login.php';</script>"; 
 }
  $id = "$_SESSION[lopon]";
  echo"<script>location.href='checkout.php';</script>";
  


?>