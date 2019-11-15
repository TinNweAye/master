

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

// for one month before
// $now = new DateTime();
// $current_month =   $now->format('Y-m');
// $next_month = date("Y-m", strtotime("$current_month +1 month"));
//	print_r($_SERVER) ; die;					
// $base_url =  $_SERVER["SERVER_NAME"];//Router::url('/', true) ;	
 //$link = "http://".$base_url."/"; //$protocol.$hostName;

date_default_timezone_set("Asia/Rangoon");
$curtimemin=date('i');
$curtimehr=date('H')*60+$curtimemin;
$todaydate=date("Y-m-d")." "."00:00:00";
echo $curtimehr."<br>";
//echo $todaydate."<br>";

try {
				for($i=0;$i<3;$i++){
					$mail = new PHPMailer(true);
					//Send mail using gmail
$mail->SMTPDebug = 2;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = true; // sets the prefix to the servier
$mail->Host = "ssl://mail01.brycenmyanmar.com.mm"; //  sets GMAIL as the SMTP server
$mail->Port = 465; // set the SMTP port for the GMAIL server
$mail->Username = "bamawl_hr"; // GMAIL username
$mail->Password = "wf9eYmCW"; // GMAIL password
$mail->smtpConnect([
   'ssl' => [
       'verify_peer' => false,
       'verify_peer_name' => false,
       'allow_self_signed' => true
   ]
]);
					$from = "bamawl_hr@brycenmyanmar.com.mm";
					$to = "tinnweaye@brycenmyanmar.com.mm";
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					$subject = "Testing Mail!";

					$body="<html><body>Hello World!</html></body>";

					$mail->isHTML(true);
					$mail->AddAddress($to); //to 
					$mail->SetFrom($from); //sent from 
					$mail->Header=$headers;
					$mail->Subject = $subject;
					$mail->Body = $body;

					if(!$mail->Send()) {
					   echo 'Message was not sent.'."<br>"."<br>";
					   echo "Mailer Error: " . $mail->ErrorInfo;
					   } 
					else {
					   echo 'Message has been sent.'."<br>"."<br>";
					} 
						//$mail->Send();
						//echo "Success!";
					
				}				
	} catch (Exception $e) {
		
		echo "Fail - " . $mail->ErrorInfo;
	}	
