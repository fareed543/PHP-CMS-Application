<?php /**/ ?><? session_start();
if(!isset($_SESSION["gblAdminId"])) header("location: index.php");
include("includes/connection.php");
include("includes/validatestring.inc");

$lang=$_REQUEST["lang"];

if($_REQUEST["tType"]=="Edit")   
{
	$fckeditor = fnValidateString($_REQUEST["fckeditor"]);
		
	$engid="";
	if($lang=="en") {
		$engid = $_REQUEST["uid"]; 
	} else {
		$engid = $_REQUEST["english_title"];
	}
	
	$query="update wm_cms set page_name='".addslashes($_REQUEST['txtHead'])."' , page_desc='".addslashes($_REQUEST['fckeditor'])."',meta_title='".addslashes($_REQUEST['meta_title'])."',meta_keywords='".addslashes($_REQUEST['meta_keywords'])."',meta_description='".addslashes($_REQUEST['meta_description'])."' where page_id=".$_REQUEST["uid"];
	
	mysql_query($query);
	if($_REQUEST['app']==1)
	{
		header("location: editcontent.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}else
	{
		header("location: viewcontent.php?va=2&pg=$pg");
		exit;
	}
} 
?>