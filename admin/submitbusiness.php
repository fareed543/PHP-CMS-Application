<?php /**/ ?><? session_start();
if(!isset($_SESSION["gblAdminId"])) header("location: index.php");
include("includes/connection.php");
$pg=$_REQUEST["pg"];
$im_top      = $_REQUEST["im_top"];


 echo $im_top;
 //exit;

if($_REQUEST["tType"]=="Add")
{

	if($im_top =='Y'){
			
			 $query =  " SELECT * FROM  wn_service where im_top='Y' "; 
                         $result = mysql_query($query);
                          while($rows = mysql_fetch_array($result)) { 
						 
						$sql = "update wn_service set im_top =0";
						mysql_query($sql);
						 
						  }
			
			
			}


	$sqlstr = "insert into   wn_service (se_name,se_desc,sede,im_top) values ('".$_REQUEST["sname"]."','".$_REQUEST["se_desc"]."','".addslashes($_REQUEST['fckeditor'])."','".addslashes($im_top)."')";
	//echo "dfdshfjdshfjds".$sqlstr;
	//exit;
	mysql_query($sqlstr);
	header("location: viewbusiness.php?va=1");
	exit;
}
else if($_REQUEST["tType"]=="Edit") {



				if($im_top =='Y'){
			
			 $query =  " SELECT * FROM  wn_service where im_top='Y' "; 
                         $result = mysql_query($query);
                          while($rows = mysql_fetch_array($result)) { 
						 
						$sql = "update wn_service set im_top =0";
						mysql_query($sql);
						 
						  }
			
			
			}

	$sqlstr = "update   wn_service set se_name='".$_REQUEST["sname"]."',se_desc='".$_REQUEST["se_desc"]."',sede='".addslashes($_REQUEST['fckeditor'])."',im_top ='".$_REQUEST["im_top"]."' where se_id=".$_REQUEST["uid"];
	
	//echo $sqlstr;
	//exit;
	mysql_query($sqlstr);

	if($_REQUEST['app']==1)
	{
		header("location: editbusiness.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}else
	{
		header("location: viewbusiness.php?va=2&pg=$pg");
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
		$sqlstr = "delete from wn_service where se_id=".$messageid[$i];
		mysql_query($sqlstr);
		}
	header("location: viewbusiness.php?va=3&pg=$pg");
	exit;
}
?>