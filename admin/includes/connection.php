<?php 
$type="local";
if($type=="local"){

	/*$server="mysql.delifestudio.com";
	$db="delife_real";
	
	$username="delifestudio";
	$password="delife!@#";*/
	
	$server="localhost";
	$db="test";
	$username="root";
	$password="";
	
}
$link=mysql_connect($server,$username,$password) or die("Could not connect to Mysql Server");
$con=mysql_select_db($db, $link) or die ("Database $db does not exist");




?>