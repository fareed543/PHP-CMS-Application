<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];

$to=$email;
$subject="$name has Post on Dynamic Tools";

$message = "<html><head><style>td { font-family:verdana  font-size:13px  }</style></head>";
$message.  "<body><TABLE>";
$message.  "<TR><TD>Sender Name</TD><TD>$name</TD></TR>";
$message.  "<TR><TD>Email Id</TD><TD>email</TD></TR>";
$message. "<TR><TD>Mobile Number</TD><TD>$phone</TD></TR>";
$message. "<TR><TD>Message</TD><TD>$message</TD></TR></TABLE>";
$message.  "</body></html>";

$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header .= 'From: Jobshunter.in <fareed@jobshunter.in>' . "\r\n";

$sentmail = mail($to,$subject,$message,$header);


if($sentmail)
{ 
	echo "<h2>Thank you For Writing to us</h2>"; 
}
else
{
	echo "<h2>Server is busy Plase Try After Some time</h2>";
}