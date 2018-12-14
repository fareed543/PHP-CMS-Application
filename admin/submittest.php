<?php /**/ ?><? session_start();
ob_start();
if(!isset($_SESSION["gblAdminId"])) header("location: index.php");
include("includes/connection.php");
$pg=$_REQUEST["pg"];
/* $im_top      = $_REQUEST["im_top"]; */
/*$img      = $_REQUEST["in_image"];

                
    // echo "value ".$hotprop;
	// exit;
$path="../uploads/";
if($_REQUEST["tType"]=="Add")
{

		if (is_uploaded_file($_FILES['img']['tmp_name'])){
					
				$imgfull    = $_FILES['img']['name'];
				$imgpos     = strrpos($imgfull, ".");
				$imgname1   = substr($imgfull,0,$imgpos);
				$imgext     = substr($imgfull,$imgpos);
				$imgname    = $imgname1.rand (0,9999);
				$image31      = $imgname.$imgext;
				
				copy($_FILES['img']['tmp_name'], $path.$image31);

				
			} else{
				$image31 = $_REQUEST["previmg1"];
				
			}	
			
			
			echo $image31;*/
				
		
	  
	$sqlstr = "insert into wn_tst (tst_name,tst_title,tst_desc,date) values ( '".$_REQUEST["tst_name"]."','".$_REQUEST["tst_title"]."','".$_REQUEST["tst_desc"]."','"."',now())";
// echo $sqlstr;
// exit;
	mysql_query($sqlstr);
	header("location: viewtest.php?va=1");
	exit;
}
else if($_REQUEST["tType"]=="Edit") {



//echo $result;
//exit;

/*if (is_uploaded_file($_FILES['img']['tmp_name'])){
					
				$imgfull    = $_FILES['img']['iname'];
				$imgpos     = strrpos($imgfull, ".");
				$imgname1   = substr($imgfull,0,$imgpos);
				$imgext     = substr($imgfull,$imgpos);
				$imgname    = $imgname1.rand (0,9999);
				$image31      = $imgname.$imgext;
				
				copy($_FILES['img']['tmp_name'], $path.$image31);

				
			} else{
				$image31 = $_REQUEST["previmg1"];
				
			}	
			
			
			echo $image31;*/

	
		
	  
			
					//print_r($_REQUEST);
					//exit;

	$sqlstr = "update wn_tst set tst_name ='".$_REQUEST["tst_name"]."' ,tst_title ='".$_REQUEST["tst_title"]."' ,tst_desc ='".$_REQUEST["tst_desc"]."' ,date =now()  where tst_id=".$_REQUEST["uid"];

//echo $sqlstr;
//exit;
	mysql_query($sqlstr);

	if($_REQUEST['app']==1)
	{
		header("location: edittest.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}else
	{
		header("location: viewtest.php?va=2&pg=$pg");
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
	//	$query = "select cms_img from wn_cms where im_id=".$messageid[$i];
			//echo $query;
			//exit;
		//	$result=mysql_query($query);
		//	$rs= mysql_fetch_array($result);
			//echo '-----'.$rs['img'].'-----';
			//echo $sqlstr;
			//echo $query;
			//exit;
			
			//if(file_exists($path.$rs['previmg']))
              //                      @unlink($path.$rs['previmg']);
			
		$sqlstr = "delete from wn_tst where tst_id=".$messageid[$i];
		//echo $sqlstr;
		//exit;
		mysql_query($sqlstr);
		}
	header("location: viewtest.php?va=3&pg=$pg");
	exit;
}
?>