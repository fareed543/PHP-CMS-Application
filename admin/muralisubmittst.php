<?php /**/ ?><?php session_start();
if(!isset($_SESSION["gblAdminId"])) header("location: index.php");
include("includes/connection.php");
if($_REQUEST['tType']=='Add'){
	$sqlstr = "insert into murali_tst (tst_name, tst_title, tst_desc, date) values ('".$_REQUEST["tst_name"]."','".$_REQUEST["tst_title"]."','".$_REQUEST["tst_desc"]."',now())";
	mysql_query($sqlstr);
	
	
	$ID = mysql_insert_id();
	if($_REQUEST['app']==1)
	{
		header("location: muraliedittst.php?tType=Edit&pg=$pg&uid=$ID");
		exit;
	}elseif($_REQUEST['app']==0)
	{
	@header("location: murali.php?va=1&sp=sub8");
	exit;
	}
}
	else if($_REQUEST["tType"]=="Edit") {

	$sqlstr = "update murali_tst set tst_name='".$_REQUEST["tst_name"]."', tst_title='".$_REQUEST["tst_title"]."', tst_desc='".    $_REQUEST["tst_desc"]."' ,date =now() where tst_id=".$_REQUEST["uid"];

	mysql_query($sqlstr);
	if($_REQUEST['app']==1)
	{
		header("location: muraliedittst.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}else
	{
		header("location: murali.php?va=2&pg=$pg");
		exit;
	}
	
}

else if($_REQUEST["tType"]=="Del")
{
		$messageid=$_REQUEST["chkdelids"];
		$messageid=explode(",",$messageid);
		$count=count($messageid);
		for($i=0;$i<$count;$i++)
		{
			 
			$sqlstr = "delete from murali_tst where tst_id=".$messageid[$i];
			mysql_query($sqlstr);
		}
	header("location: murali.php?va=3&sp=sub8&pg=$pg");
	exit;
}
 



?>
	
