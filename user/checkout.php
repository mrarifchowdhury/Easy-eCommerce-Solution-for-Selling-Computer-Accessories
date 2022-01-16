<?php

session_start();


if (  isset($_SESSION['total']) &&  isset($_SESSION['client_access'])  ) 
 {

$uname = $_SESSION['uname'];
$id = $_SESSION['u_id'];




                if (isset($_SESSION['total']))
                {


                $totaltaka = $_SESSION['total'];

                }

                else
                {

                $totaltaka = "0";

                }



include("checkout_process.php");


}



elseif (isset($_SESSION['client_access'])){
$uname = $_SESSION['uname'];
$id = $_SESSION['u_id'];




            if (isset($_SESSION['total'])){


            $totaltaka = $_SESSION['total'];

            }

            else
            {

            $totaltaka = "0";

            }


include("checkout_process.php");
}


else 

{
    echo "<script> document.location.href='user_login1.php';</script>";
}

?>