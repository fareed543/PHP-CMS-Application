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

$sqlstr = "insert into wn_latestinfo(`rec_numbers`, `rec_emails`, `rec_news`, `image`, `headline`, `rec_discription`) values ('".$_REQUEST['rec_numbers']."','".$_REQUEST['rec_emails']."','".$_REQUEST['rec_news']."','".addslashes($image3)."','".$_REQUEST['headline']."','".$_REQUEST['rec_discription']."')";
	// echo $sqlstr;
	mysql_query($sqlstr)or die(mysql_error());
	@header("location: viewproduct1.php?va=1");
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
			
	


		
	$sqlstr = "update wn_latestinfo SET rec_numbers='".$_REQUEST['rec_numbers']."', rec_emails='".$_REQUEST['rec_emails']."',rec_news='".$_REQUEST['rec_news']."', headline='".$_REQUEST['headline']."',rec_discription='".$_REQUEST['rec_discription']."',	image='".$image3."'  where id=".$_REQUEST["uid"];
	//echo $sqlstr;
//exit;
	mysql_query($sqlstr);

	if($_REQUEST['app']==1)
	{
		header("location: editproduct1.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}else
	{
		header("location: viewproduct1.php?va=2&pg=$pg");
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
		$query = "select image from wn_product where id=".$messageid[$i];
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

		$sqlstr = "delete from  wn_latestinfo where id=".$messageid[$i];
		//echo $sqlstr;
		//exit;
		mysql_query($sqlstr);
		}
	header("location: viewproduct1.php?va=3&pg=$pg");
	exit;
}
?>