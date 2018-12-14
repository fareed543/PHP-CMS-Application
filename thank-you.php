
<?
$name=$_POST['name'];
$mail=$_POST['email'];
//$email=$_POST['email'];
$email="fareed543@gmail.com";
$phone=$_POST['phone'];
$msg=$_POST['message'];

$to=$email;
$subject="A new Post on Dynamic Tools";
$header="from: Dynamic Tools < info@dynamictools.com >";

$message="$name Posted on Dynamic Tools Page \r\n";
$message.="\n\nUserName:\t$name\nUserEmail:\t$mail\nContact Number:\t$phone\n\nUserMessage:\n$msg\n\n";

$sentmail = mail($to,$subject,$message,$header);
if($sentmail)
{ 
	echo "<h2>Thank you For Writing to us</h2>"; 
}
else
{
	echo "<h2>Server is busy Plase Try After Some time</h2>";
}

?>