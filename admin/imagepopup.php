<?php /**/ ?><?
include_once('includes/connection.php');
$from=$_REQUEST["from"];
if($from=="sub_cat_img") {
	$folder1="../uploads/sub_cat_img/";
	$sql="select cat_id,image from wn_categories where cat_id ='".$_REQUEST["aid"]."'";
}
elseif($from=="brands") {
	$folder1="../uploads/brands/";
	$sql="select brand_name,brand_logo from fs_brands where brand_id='".$_REQUEST["aid"]."'";
}
 $re=mysql_query($sql);
$ro=mysql_fetch_array($re);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?=$ro[0]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >

<table border="0" align="center" cellpadding="0" cellspacing="0" >
 
  <tr> 
    <td  align="center" valign="middle"><img src="<?=$folder1?><?=$ro[1]?>"  border="0"></td>
  </tr>
   <tr>
    <td height="20" bgcolor="#FFFFFF"><img src="../images/paper.gif" width="1" height="1"></td>
  </tr> 
  <tr>
    <td height="20" align="center" valign="middle" > 
        <a href="javascript: window.close()" class="var11regblack"><img src="images/delete_ico.gif" border=0></a> 
    </td>
  </tr>
</table>
</body>
</html>