

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

//Send mail using brycen-mail
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
$mail->Username = "testbrycenmyanmar17@gmail.com"; // GMAIL username
$mail->Password = "bcmm2018test"; // GMAIL password

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
		$sql="SELECT booking_id,user_id,user_name,booking_date,booking_time_from,booking_time_to,person,driver_name,driver_phone,car_type,car_number,pick_up_place,email,car_number FROM tbl_booking,employee_personal WHERE  user_id=employee_personal.employee_id AND tbl_booking.mail_flag=0 AND  booking_date='$todaydate' AND send_time='$curtimehr'";
					
		$result = $conn->query($sql);	
			
		if (!empty($result)) {
			
			foreach($result as $res){			
				
				$from = "brycen.myanmar.gcp.test@gmail.com";
				//$to = "tinnweaye@brycenmyanmar.com.mm";
				$to = $res['email'];
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$bookingid=$res['booking_id'];
				$bookdate=$res['booking_date'];
				$bookingDate=substr($bookdate,0,10);
				$bookTimeF=$res['booking_time_from'];
				$bookTimeFrom=substr($bookTimeF,11,5);
				$bookTimeT=$res['booking_time_to'];
				$bookTimeTo=substr($bookTimeT,11,5);
				$UserName=$res['driver_name'];
				$Phone=$res['driver_phone'];
				$carno=$res['car_number'];
				$noPerson=$res['person'];
				$place=$res['pick_up_place'];

				$subject = "Your Booking Time is Coming Soon!";

				$body="<html><body>";
				$body.="<div style=' width: 60%;margin: 10px 30% 10px 25%;border-radius: 40px;box-shadow:0px 0px 10px #CEB150; background: url(http://carbooking.cloudhr.co/app/webroot/img/landscape.jpg);background-size: 100% 100%;'>
			   <img src='http://carbooking.cloudhr.co/app/webroot/img/bamawl.png' style='margin-top: 50px; margin-left: 50px;'>
			    <form style='width:60%; margin:4% 15%;'>
				<header>
				<h3 style='color: #CEB150; font-family: 'Lucida Calligraphy';font-weight:bold;'>Booking Notification</h3>
				</header>
				<label class='col-sm-2' style='color: #CEB150;font-size: 15px;font-weight:bold;'>Booking Date </label>
				<p style='font-weight:bold;color: black;'>$bookingDate</p>
				<label class='col-sm-2' style='color: #CEB150;font-size: 15px;font-weight:bold;'>Booking Time </label>
				<p style='font-weight:bold;color: black;'>$bookTimeFrom
				~$bookTimeTo</p>

				 <label class='col-sm-2' style='color: #CEB150;font-size: 15px;font-weight:bold;'>Driver Name </label>
				<p style='font-weight:bold;color: black;'>$UserName
				</p>
				<label class='col-sm-2' style='color: #CEB150;font-size: 15px;font-weight:bold;'>Car Number </label>
				<p style='font-weight:bold;color: black;'>$carno
				</p>
				<label class='col-sm-2' style='color: #CEB150;font-size: 15px;font-weight:bold;'>Phone Number  </label>
				<p style='font-weight:bold;color: black;'>$Phone</p>
				<label class='col-sm-2' style='color: #CEB150;font-size: 15px;font-weight:bold;'>Number of Person :</label>
				<p style='font-weight:bold;color: black;'>$noPerson
				</p>
				<label class='col-sm-2' style='color: #CEB150;font-size: 15px;font-weight:bold;'>Pick Up Place </label>
				<p style='font-weight:bold;color: black;'>$place</p>
				
				<span style='font-size: 14px;color: #ff3333;'>If you have change your plan, click link to login and cancel your booking:</span><a href='http://carbooking.cloudhr.co/BookingList?init=init' target='_blank' style='color:green;font-size: 13px;font-family:Lucida Calligraphy;font-weight: bold;'> Click Here </a><br><br>

				<span style='font-size: 14px;color: black;'>More Information visit :</span><a href='http://brycenmyanmar.com.mm' target='_blank' id='fter' style='color:green;font-size: 13px;font-family:Lucida Calligraphy;font-weight: bold;'> Brycen Myanmar Co.,Ltd.</a><br><br><br><br>

				</form>
				</div>";
				$body.="</html></body>";

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
