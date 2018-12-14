<? session_start();
ob_start();
if(!isset($_SESSION["gblAdminId"])) header("location: index.php");

/*echo "<pre>";
print_r($_REQUEST);
EXIT;*/
$name=$_POST['name'];
$to=$_POST['subscribers'];
$disc=$_POST['disc'];
$sub=$_POST['subject'];

//print_r($_REQUEST);
$subject="$sub";

$msg = "<html><head><style>td { font-family:verdana  font-size:13px  }</style></head>";
$msg.= "<body><TABLE>";
$msg.= "<TR><TD colspan=2>Greetings.<br />Dynamic Tools India Private Limited<br /><br /><br /></TD></TR>";
$msg.= "<TR><TD>Message</TD><TD>$disc<br /><br /><br /></TD></TR>";
$msg.= "<TR><TD colspan=2>Thanks and Regards.<br />Dynamic Tools India Private Limited<br /></TD></TR>";
$msg.= "</TABLE></body></html>";
//echo $message;
$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header .= 'From: Dynamic Tools <fareed@rsoftindia.com>' . "\r\n";

    /*include ("admin/includes/connection.php");
	$sqlstr = "select * from wn_subscribers ";
	$myResult = mysql_query($sqlstr);
	while($r = mysql_fetch_array($myResult))
	{
	$to=$row['email'];
	$to=$email;
	$sentmail = mail($to,$subject,$message,$header);
	}*/
	if(sizeof($_REQUEST['subscribers'])>0)
	{
		foreach($_REQUEST['subscribers'] as $k=>$v)
		{
			mail($v,$subject,$msg,$header);
				//echo $v." ".$subject." ".$msg." ".$header."<br/>";
				//exit;
				//echo $message."<br/>";
		}

	@header("location:viewsubscribers.php?va=1");
	}else
	{
	@header("location:viewsubscribers.php?va=2");
	exit;
	}


/*if($sentmail)
{ 
	@header("location:viewsubscribers.php?va=1");
	exit;
}
else	
{
    @header("location:viewsubscribers.php?va=2");
	exit;
}*/
?>