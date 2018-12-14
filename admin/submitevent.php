<?php /**/ ?><? session_start();
if(!isset($_SESSION["gblAdminId"])) header("location: index.php");
include("includes/connection.php");
$pg=$_REQUEST["pg"];
                
    // echo "value ".$hotprop;
	// exit;
$path="../uploads/";
if($_REQUEST["tType"]=="Add")
{

				
		if (is_uploaded_file($_FILES['e_image']['tmp_name'])){
					
				$imgfull    = $_FILES['e_image']['name'];
				$imgpos     = strrpos($imgfull, ".");
				$imgname1   = substr($imgfull,0,$imgpos);
				$imgext     = substr($imgfull,$imgpos);
				$imgname    = $imgname1.rand (0,9999);
				$image3      = $imgname.$imgext;
				
				copy($_FILES['e_image']['tmp_name'], $path.$image3);

				
			} else{
				$image3 = $_REQUEST["previmg"];
				
			}
			//echo $image3;
			

	$sqlstr = "insert into wn_event (e_name,e_image,e_desc,e_date) values ( '".addslashes($_REQUEST["e_name"])."', '".addslashes($image3)."','".addslashes($_REQUEST["fckeditor"])."','".addslashes($_REQUEST["e_date"])."' )";
//echo $sqlstr;exit;

	mysql_query($sqlstr);
	header("location: viewevent.php?va=1");
	exit;
}
else if($_REQUEST["tType"]=="Edit") {



//echo $result;
//exit;


			if (is_uploaded_file($_FILES['e_image']['tmp_name'])){
					
				$imgfull    = $_FILES['e_image']['name'];
				$imgpos     = strrpos($imgfull, ".");
				$imgname1   = substr($imgfull,0,$imgpos);
				$imgext     = substr($imgfull,$imgpos);
				$imgname    = $imgname1.rand (0,9999);
				$image3      = $imgname.$imgext;
				
				copy($_FILES['e_image']['tmp_name'], $path.$image3);

				
			} else{
				$image3 = $_REQUEST["previmg"];
				
			}
			
	
	  
			
		
									 

	$sqlstr = "update wn_event set e_name = '".addslashes($_REQUEST["e_name"])."',  e_image='".$image3."',e_desc='".addslashes($_REQUEST["fckeditor"])."',e_date = '".addslashes($_REQUEST["e_date"])."' where e_id=".$_REQUEST["uid"];
//echo $sqlstr;
//exit;
	mysql_query($sqlstr);

	if($_REQUEST['app']==1)
	{
		header("location: editevent.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}else
	{
		header("location: viewevent.php?va=2&pg=$pg");
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
		$query = "select e_iamge from wn_event where e_id=".$messageid[$i];
			//echo $query;
			//exit;
			$result=mysql_query($query);
			$rs= mysql_fetch_array($result);
			//echo '-----'.$rs['img'].'-----';
			//echo $sqlstr;
			//echo $query;
			//exit;
			
			if(file_exists($path.$rs['e_iamge']))
                                    @unlink($path.$rs['e_iamge']);
			
		$sqlstr = "delete from wn_event where e_id=".$messageid[$i];
		//echo $sqlstr;
		//exit;
		mysql_query($sqlstr);
		}
	header("location: viewevent.php?va=3&pg=$pg");
	exit;
}
?>