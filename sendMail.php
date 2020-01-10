

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

//Send mail using 
$mail->SMTPDebug = 2;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = true; // sets the prefix to the servier
$mail->Host = "ssl:"; //  sets GMAIL as the SMTP server
$mail->Port = 465; // set the SMTP port for the GMAIL server
$mail->Username = ""; // GMAIL username is the word in front of @gmail 
$mail->Password = ""; // GMAIL password
$mail->client= null;
$mail->log=false;
$mail->smtpConnect([		//ignore certificate verification
   'ssl' => [
       'verify_peer' => false,
       'verify_peer_name' => false,
       'allow_self_signed' => true
   ]
]);


//Send mail using gmail
$mail->SMTPDebug = 2;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = false; // sets the prefix to the servier
$mail->Host = "ssl://smtp.gmail.com"; //  sets GMAIL as the SMTP server
$mail->Port = 465; // set the SMTP port for the GMAIL server
$mail->Username = "test@gmail.com"; // GMAIL username
$mail->Password = ""; // GMAIL password

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_booking";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// for one month before
// $now = new DateTime();
// $current_month =   $now->format('Y-m');
// $next_month = date("Y-m", strtotime("$current_month +1 month"));
// 	print_r($_SERVER) ; die;					
// $base_url =  $_SERVER["SERVER_NAME"];//Router::url('/', true) ;	
// $link = "http://".$base_url."/"; //$protocol.$hostName;

date_default_timezone_set("Asia/Rangoon");
$curtimemin=date('i');
$curtimehr=date('H')*60+$curtimemin;
$todaydate=date("Y-m-d")." "."00:00:00";
//echo $curtimehr."<br>";
//echo $todaydate."<br>";


try {
		$sql="";
					
		$result = $conn->query($sql);	
			
		if (!empty($result)) {
			
			foreach($result as $res){			
				
				$from = "test@gmail.com";
				//$to = "test@company.com.mm";
				$to = $res['email'];
				


				$mail->isHTML(true);
				$mail->AddAddress($to); //to 
				$mail->SetFrom($from); //sent from 
				$mail->Header=$headers;
				$mail->Subject = $subject;
				$mail->Body = $body;

				
				try{
					$mail->Send();
					echo "Success!";
					 $sql2 = "Update tbl_booking SET mail_flag='1' Where  booking_id='$bookingid' ";
					$result = $conn->query($sql2);
				} catch(Exception $e){
					//Something went bad
					echo "Fail - " . $mail->ErrorInfo;
				}
			}			
			
		  } else {
			
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
				
	} catch (Exception $e) {
		
		echo "Fail - " . $mail->ErrorInfo;
	}	
