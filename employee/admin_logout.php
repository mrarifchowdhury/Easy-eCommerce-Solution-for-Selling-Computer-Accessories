

<?php
session_start();
unset($_SESSION['employee_access']);
unset($_SESSION['employee_fname']);
unset($_SESSION['employee_id']);

session_destroy();
echo "<script> document.location.href='../login.php';</script>";
exit;
?>