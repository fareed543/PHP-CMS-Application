<?php /**/ ?><? session_start();
if(!isset($_SESSION["gblAdminId"])) header("location: index.php");
include("includes/connection.php");
$pg=$_REQUEST["pg"];
                
    // echo "value ".$hotprop;
	// exit;
$path="../uploads/";
if($_REQUEST["tType"]=="Add")
{

				
		if (is_uploaded_file($_FILES['in_image']['tmp_name'])){
					
				$imgfull    = $_FILES['in_image']['name'];
				$imgpos     = strrpos($imgfull, ".");
				$imgname1   = substr($imgfull,0,$imgpos);
				$imgext     = substr($imgfull,$imgpos);
				$imgname    = $imgname1.rand (0,9999);
				$image3      = $imgname.$imgext;
				
				copy($_FILES['in_image']['tmp_name'], $path.$image3);

				
			} else{
				$image3 = $_REQUEST["previmg"];
				
			}
			
			

	$sqlstr = "insert into wn_index (in_image) values (  '".addslashes($image3)."' )";
	// echo $sqlstr;
	// exit;
	mysql_query($sqlstr);
	header("location: viewhomebanners.php?va=1");
	exit;
}
else if($_REQUEST["tType"]=="Edit") {



//echo $result;
//exit;


			if (is_uploaded_file($_FILES['in_image']['tmp_name'])){
					
				$imgfull    = $_FILES['in_image']['name'];
				$imgpos     = strrpos($imgfull, ".");
				$imgname1   = substr($imgfull,0,$imgpos);
				$imgext     = substr($imgfull,$imgpos);
				$imgname    = $imgname1.rand (0,9999);
				$image3      = $imgname.$imgext;
				
				if($_REQUEST['previmg']!="")
					{
			if(isset($image3)&& file_exists($path.$_REQUEST['previmg']))
			unlink($path.$_REQUEST['previmg']);
				}
				copy($_FILES['in_image']['tmp_name'], $path.$image3);

				
			} else{
				$image3 = $_REQUEST["previmg"];
				
			}
			
	
	  
			
		
									 

	$sqlstr = "update wn_index set   in_image='".$image3."'  where in_id=".$_REQUEST["uid"];
//echo $sqlstr;
//exit;
	mysql_query($sqlstr);

	if($_REQUEST['app']==1)
	{
		header("location: edithomebanners.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}else
	{
		header("location: viewhomebanners.php?va=2&pg=$pg");
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
		$query = "select in_image from wn_index where in_id=".$messageid[$i];
			//echo $query;
			//exit;
			$result=mysql_query($query);
			$rs= mysql_fetch_array($result);
			//echo '-----'.$rs['img'].'-----';
			//echo $sqlstr;
			//echo $query;
			//exit;
			
			if(file_exists($path.$rs['in_image']))
                                    @unlink($path.$rs['in_image']);
			
		$sqlstr = "delete from wn_index where in_id=".$messageid[$i];
		//echo $sqlstr;
		//exit;
		mysql_query($sqlstr);
		}
	header("location: viewhomebanners.php?va=3&pg=$pg");
	exit;
}
?>