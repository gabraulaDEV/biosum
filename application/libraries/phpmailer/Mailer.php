<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer
{
	
	public function __construct()
	{
		require_once "PHPMailer/PHPMailer.php";
		require_once "PHPMailer/SMTP.php";
		require_once "PHPMailer/Exception.php";
		
	}

	public function sendSimpleMail($destinatario,$asunto,$cuerpo)
	{
		try {
		    $mail =new PHPMailer\PHPMailer\PHPMailer();

			 /***********Server settings************/
		    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers, in this case GMAIL
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'biosuministros.info@gmail.com';                 // SMTP username
		    $mail->Password = 'BiosumInfo14321432';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    /************Recipients************/
		    $mail->setFrom('biosuministros.info@gmail.com', 'Biosuministros');
		    $mail->addAddress($destinatario, 'Estimado cliente');     // Add a recipient
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    /***************Attachments**********/
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    /***************Content***********/
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $asunto;
		    $mail->Body    = $cuerpo;
		    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    if($mail->send())
			 {
				return true;
			 }
			 else
			 {
				return false;
			 }
		    
		}
		catch(Exception $e)
		{
		   	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			return false;
		}                        
               
		
	}
}

?>