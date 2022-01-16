
<?php
session_start();
unset($_SESSION['admin_access']);
unset($_SESSION['admin_fname']);
unset($_SESSION['admin_id']);



session_destroy();
echo "<script> document.location.href='../login.php';</script>";

?>