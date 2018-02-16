<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
//require 'vendor/autoload.php';

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';




if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
	$email = $_POST['email'];
	$message = "I'm sorry you forgot your password";
	$resetLink = "http://localhost/blog15/visitor/login.php";
	$headers = 'From: e.vandijk02@hotmail.com' . "\r\n" .
    'Reply-To: e.vandijk02@hotmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $mail = new PHPMailer(true); 
    

    //ini_set('sendmail_from', );

	include "configMSQLI.php";

    $connection = mysqli_connect($host, $user, $pass, $db);

    $sql = "SELECT email FROM registervisitor WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1) {
    	//mail($email, $message, $resetLink, $headers);

    	try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.mailtrap.io';  					// Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = '1aea82f55c5334';                 // SMTP username
		    $mail->Password = 'bcb07d0e313365';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 465;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('evandijk89@gmail.com', 'Mailer');
		    $mail->addAddress('evandijk89@gmail.com', 'Joe User');     // Add a recipient
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    //$mail->addReplyTo('e.vandijk02@hotmail.com', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Here is the subject';
		    $mail->Body    = $message . "<br/>" .	 $resetLink;
		    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();

		    echo 'Message has been sent';
		    header("Location: ".$_SERVER['HTTP_REFERER']);
			} 
			catch (Exception $e) {
			    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
    }
    else {
    	mysqli_close($connection); // Closing Connection
    	echo "<script type='text/javascript'>alert('Email is not registered');</script>"; 
        //echo "<script> window.history.go(-1); </script>";
    }
}
?>