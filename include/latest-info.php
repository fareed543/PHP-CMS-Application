<?
    include ("admin/includes/connection.php");
	$sqlstr = "select * from wn_latestinfo order by id DESC ";
	$myResult = mysql_query($sqlstr);
	if($all = mysql_fetch_array($myResult))
?>