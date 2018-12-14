<?php /**/ ?><? session_start();
if(!isset($_SESSION["gblAdminId"])) header("location: index.php");
include("includes/connection.php");
$pg=$_REQUEST["pg"];
                
    // echo "value ".$hotprop;
	// exit;
$path="../uploads/";
if($_REQUEST["tType"]=="Add")
{

		
			//echo $image3;
			

	$sqlstr = "insert into wm_cms (page_name,page_desc) values ( '".$_REQUEST["page_name"]."','".$_REQUEST["fckeditor"]."' )";
//echo $sqlstr;
// exit;
	mysql_query($sqlstr);
	header("location: viewtalks.php?va=1");
	exit;
}
else if($_REQUEST["tType"]=="Edit") {



//echo $result;
//exit;


	
	  
			
		
									 

	$sqlstr = "update wm_cms set page_name = '".$_REQUEST["page_name"]."',page_desc='".$_REQUEST["fckeditor"]."' where page_id=".$_REQUEST["uid"];
//echo $sqlstr;
//exit;
	mysql_query($sqlstr);

	if($_REQUEST['app']==1)
	{
		header("location: edittalks.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}else
	{
		header("location: viewtalks.php?va=2&pg=$pg");
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
		//$query = "select e_iamge from wm_cms where e_id=".$messageid[$i];
			//echo $query;
			//exit;
		//	$result=mysql_query($query);
			//$rs= mysql_fetch_array($result);
			//echo '-----'.$rs['img'].'-----';wm_cms
			//echo $sqlstr;
			//echo $query;
			//exit;
			
		
			
		$sqlstr = "delete from wm_cms where page_id=".$messageid[$i];
		//echo $sqlstr;
		//exit;
		mysql_query($sqlstr);
		}
	header("location: viewtalks.php?va=3&pg=$pg");
	exit;
}
?>