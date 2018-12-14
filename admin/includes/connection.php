<?php 
	$server="server"; //localhost
	$db="database-name"; // database name
	$username="database-username"; // root for XAMPP
	$password="database-password"; 

	$link=mysql_connect($server,$username,$password) or die("Could not connect to Mysql Server");
	$con=mysql_select_db($db, $link) or die ("Database $db does not exist");
?>