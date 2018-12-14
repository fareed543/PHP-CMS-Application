<?php 
ob_start();
session_start();


//echo str_rot13(substr('6405f9cfdeb9894bf981febfc2ca18c0Fnlab2C',32));
//exit;
include("includes/connection.php");
/*$re=mysql_query("select * from wn_admin",$link);
while($rs= mysql_fetch_array($re)) {
	$pass =str_rot13(substr($rs[admin_pswd],32));
//echo "pass=".$pass."<br>";
}*/
//exit;
if($_POST["Page"]=="AdminLogin"){
	if(($_REQUEST["uname"] <> "") && ($_REQUEST["pword"] <> "")){
		$pwd1=md5(strrev($_REQUEST["pword"]));
		$pwd2=str_rot13($_REQUEST["pword"]);
		$pwd=$pwd1.$pwd2;
		$re=mysql_query("select * from wn_admin where admin_uname='".$_REQUEST["uname"]."' and admin_pswd='".$pwd."'");
		$count=mysql_num_rows($re);
//echo "select * from wn_admin where admin_uname='".$_REQUEST["uname"]."' and admin_pswd='".$pwd."'";
//exit;
		if($count > 0){
			if($rs=mysql_fetch_array($re)){
				//session_register("gblAdminId");
				$_SESSION["gblAdminId"] = "";
				$_SESSION["gblAdminId"] = $rs["admin_id"];
				
				header("Location: home.php");
				exit;
			}
		}else{
			//echo "3";
			header("Location: index.php?e=3");
			exit;
		}
	}else{
		echo "2";
		//header("Location: index.php?e=2");
		exit;
	}
}else{
	echo "4";
	//header("Location: index.php");
	exit;
}
?>