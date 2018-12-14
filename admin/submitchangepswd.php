<?php /**/ ?><? session_start();
if($_SESSION["gblAdminId"]==""){header("Location: changepassword.php");exit;}
include("includes/connection.php");
if($_REQUEST["Page"]=="ChangePassword"){
	$pswd1=md5(strrev($_REQUEST["currentpswd"]));
	$pswd2=str_rot13($_REQUEST["currentpswd"]);
	$pswd=$pswd1.$pswd2;
	$re=mysql_query("select admin_id from wn_admin where admin_pswd='".$pswd."' and admin_id=".$_SESSION["gblAdminId"]);

    $count=mysql_num_rows($re);
	if($count <> 0){
		$pwd1=md5(strrev($_REQUEST["newpswd"]));
		$pwd2=str_rot13($_REQUEST["newpswd"]);
		$pwd=$pwd1.$pwd2;
		mysql_query("update wn_admin set admin_pswd='".$pwd."' where admin_id=".$_SESSION["gblAdminId"]);
		header("Location: changepassword.php?va=1");
	    exit;
	}else
	{
		header("Location: changepassword.php?va=2");
	    exit;
	}
}else{
	header("Location: changepassword.php?va=2");
	exit;
}
?>