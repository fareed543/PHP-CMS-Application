<?php /**/ ?><?
$type="local";
//$type="remote";
if($type=="local"){

	$server="localhost";
	$db="dosmaticnew";
	$username="";
	$password="";
}elseif($type=="remote"){

	$server="localhost";
	$db="dosmatic";
	$username="dosmatic";
	$password="inforlinx";
}
$link=mysql_connect($server,$username,$password) or die("Could not connect to Mysql Server");
//$link=mysql_connect($server) or die("Could not connect to Mysql Server");
$con=mysql_select_db($db,$link) or die ("Database $db does not exist");
?>