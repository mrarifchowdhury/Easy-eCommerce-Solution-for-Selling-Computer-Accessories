

<?php
session_start();
unset($_SESSION['client_access']);
unset($_SESSION['username']);
unset($_SESSION['u_id']);

session_destroy();
echo "<script> document.location.href='index.php';</script>";
exit;
?>