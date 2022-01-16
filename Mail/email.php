<html lang="en">
<?php

    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';
    require_once 'PHPMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

if(isset($_POST["submit"])) 
{
    
    $client_email=$_POST["email"];
    $name=$_POST["name"];
    $message=$_POST["msg"];
 
	$receiver_email="Caara09bdall@gmail.com";
	$company_name="A R COMPUTERS SUPPORT";
	
	
    $mail = new PHPMailer(true); 

    try
    {
    	$mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '13203031@iubat.edu';  // Sender Email
        $mail->Password = '13203031';	// Sender Email Pass
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->SetFrom('info@gmail.com','SUPPORT MAIL OF AR COMPUTERS'); // Sender Name 
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->isHTML(true);

    	$mail->addAddress($receiver_email, $company_name); // Receiver Email And Name
    	$mail->Subject = 'New Mail From Customer ('.$name . ')';
        $mail->Body= 'Client name:'.$name. '<br> '  . 'Client Email:'.$client_email.  '<br> '  .   'Message : '.$message;

       
        if($mail->send())
        {
        	echo "Email Sent Successfully  ! ";
        }
    } 
    catch (Exception $e) 
    {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

?>

</html>