<?php /**/ ?><? session_start();
if(!isset($_SESSION["gblAdminId"])) header("location: index.php");
include("includes/connection.php");
$pg=$_REQUEST["pg"];
                
    // echo "value ".$hotprop;
	// exit;
$path="../products/";
if($_REQUEST["tType"]=="Add")
{

				
		if (is_uploaded_file($_FILES['image']['tmp_name'])){
					
				$imgfull    = $_FILES['image']['name'];
				$imgpos     = strrpos($imgfull, ".");
				$imgname1   = substr($imgfull,0,$imgpos);
				$imgext     = substr($imgfull,$imgpos);
				$imgname    = $imgname1.rand (0,9999);
				$image3      = $imgname.$imgext;
				
				copy($_FILES['image']['tmp_name'], $path.$image3);

				
			} else{
				$image3 = $_REQUEST["previmg"];
				
			}
			

	$sqlstr = "insert into wn_product( prod_name, title, prod_desc, image, prod_features) 	values ('".$_REQUEST['prod_name']."','".$_REQUEST['title']."','".$_REQUEST['prod_desc']."','".addslashes($image3)."','".$_REQUEST['prod_features']."')";
	// echo $sqlstr;
	mysql_query($sqlstr);
	@header("location: viewsubscribers.php?va=1");
	exit;
}
else if($_REQUEST["tType"]=="Edit") {


//echo $result;
//exit;


			if (is_uploaded_file($_FILES['image']['tmp_name'])){
					
				$imgfull    = $_FILES['image']['name'];
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
				copy($_FILES['image']['tmp_name'], $path.$image3);

				
			} else{
				$image3 = $_REQUEST["previmg"];
				
			}
			
	
	  
			
		
	$sqlstr = "update wn_subscribers set title='".$_REQUEST['title']."', prod_desc='".$_REQUEST['prod_desc']."',prod_features='".$_REQUEST['prod_features']."', prod_name='".$_REQUEST['prod_name']."',image='".$image3."'  where id=".$_REQUEST["uid"];
	//echo $sqlstr;
//exit;
	mysql_query($sqlstr);

	if($_REQUEST['app']==1)
	{
		header("location: editsubscribers.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}else
	{
		header("location: viewsubscribers.php?va=2&pg=$pg");
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
		/*$query = "select image from wn_subscribers where id=".$messageid[$i];
			//echo $query;
			//exit;
			$result=mysql_query($query);
			$rs= mysql_fetch_array($result);
			//echo '-----'.$rs['img'].'-----';
			//echo $sqlstr;
			//echo $query;
			//exit;
			
			if(file_exists($path.$rs['image']))
                                    @unlink($path.$rs['image']);
		*/	
		$sqlstr = "delete from  wn_subscribers where id=".$messageid[$i];
		//echo $sqlstr;
		//exit;
		mysql_query($sqlstr);
		}
	header("location: viewsubscribers.php?va=3&pg=$pg");
	exit;
}
?>