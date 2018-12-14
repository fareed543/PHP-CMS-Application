<?php /**/ ?><?session_start();
if(!isset($_SESSION["gblAdminId"])) header("location: index.php");
include("includes/connection.php");
$pg=$_REQUEST["pg"];
//print_r($_REQUEST);
//exit; 
//$path="../uploads/";
//$finalpath1="../uploads/thumbs/";
//$sourcefolder="../uploads/";
if($_REQUEST["tType"]=="Add")
{
	/*$date=explode("-",$_REQUEST["fdate"]);
	$date1 = $date[2]."-".$date[1]."-".$date[0];

	if (is_uploaded_file($_FILES['article_image']['tmp_name']))
			{
				$imgfull=$_FILES['article_image']['name'];
				$imgpos = strrpos($imgfull, ".");
				$imgname = substr($imgfull,0,$imgpos);
				$imgext = substr($imgfull,$imgpos);
				$imgph = rand (0,99).$imgext;
				$fname = "file".time();
				$frontfile1=$fname."_".$imgph;
				copy($_FILES['article_image']['tmp_name'], $path.$frontfile1);
				//create_thumb($frontfile1,$sourcefolder,$finalpath1);
				
			}*/

	$sqlstr = "insert into wn_tst (tst_name, tst_title, tst_desc, date) values ('".$_REQUEST["tst_name"]."','".$_REQUEST["tst_title"]."','".$_REQUEST["tst_desc"]."',now())";
	//echo $sqlstr;
	//exit;
	mysql_query($sqlstr);
	$ID = mysql_insert_id();
/*		mysql_query("update ap_careers set article_image='".$frontfile1."' where article_id=".$ID);
	    header("location: viewnews.php?va=1&sp=sub8");
	    exit;*/
	if($_REQUEST['app']==1)
	{
		header("location: edittst.php?tType=Edit&pg=$pg&uid=$ID");
		exit;
	}elseif($_REQUEST['app']==0)
	{
	@header("location: viewtst.php?va=1&sp=sub8");
	exit;
	}
		
}

else if($_REQUEST["tType"]=="Edit") {

/*	$date=explode("-",$_REQUEST["fdate"]);
	$date1= $date[2]."-".$date[1]."-".$date[0];

	 if (is_uploaded_file($_FILES['article_image']['tmp_name']))
			{
				$imgfull=$_FILES['article_image']['name'];
				$imgpos = strrpos($imgfull, ".");
				$imgname = substr($imgfull,0,$imgpos);
				$imgext = substr($imgfull,$imgpos);
				$imgph = rand (0,99).$imgext;
				$fname = "file".time();
				$frontfile1=$fname."_".$imgph;
				if(file_exists($path.$_POST["prveeventimage"])){
					@unlink($path.$_POST["prveeventimage"]);
					//$thumbimage="t_".$_POST["prveeventimage"];
					//@unlink($finalpath1.$thumbimage);
				}
				copy($_FILES['article_image']['tmp_name'], $path.$frontfile1);
				//create_thumb($frontfile1,$sourcefolder,$finalpath1);

			} else {
			$frontfile1 = $_POST["prveeventimage"];	
			}
		*/
	$sqlstr = "update wn_tst set tst_name='".$_REQUEST["tst_name"]."', tst_title='".$_REQUEST["tst_title"]."', tst_desc='".$_REQUEST["tst_desc"]."' ,date =now() where tst_id=".$_REQUEST["uid"];
	//echo $sqlstr;
	//exit;
	mysql_query($sqlstr);
	if($_REQUEST['app']==1)
	{
		header("location: edittst.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}else
	{
		header("location: viewtst.php?va=2&pg=$pg");
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
			 
			$sqlstr = "delete from wn_tst where tst_id=".$messageid[$i];
			mysql_query($sqlstr);
		}
	header("location: viewtst.php?va=3&sp=sub8&pg=$pg");
	exit;
}
 

