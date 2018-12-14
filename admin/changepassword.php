<?php /**/ ?><? session_start();
switch($_REQUEST["va"]){
	case '1':
		$message="Your Password Has Been Changed Succussfully";
		break;
	case '2':
		$message="Please Enter Valid Password";
		break;
	default:
		$message="";
		break;
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to wine direct Control Panel</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script type="text/javascript" src="js/chrome.js"></script>
<script type="text/javascript" src="js/tabcontent.js"></script>
<script language="javascript">
function fnValidate()
{
	if(document.frmMain.currentpswd.value=="")
	{
		alert("Enter Current Password");
		document.frmMain.currentpswd.focus();
		return false;
	}
	if(document.frmMain.newpswd.value=="")
	{
		alert("Enter New Password");
		document.frmMain.newpswd.focus();
		return false;
	}
	if(document.frmMain.confirmpswd.value=="")
	{
		alert("Enter Confirm Password");
		document.frmMain.confirmpswd.focus();
		return false;
	}
	if(document.frmMain.newpswd.value != document.frmMain.confirmpswd.value)
	{
		alert("Please Check Your Password");
		document.frmMain.confirmpswd.focus();
		return false;
	}
}
</script>
<link rel="stylesheet" type="text/css" href="stylesheets/chromestyle.css" />
<link href="stylesheets/adminstyles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="stylesheets/tabcontent.css" />
<style type="text/css">
<!--
.style1 {	color: #0A69C7;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<!--change headertab color in css.css inthe follwoing style......MainContentBoxHeaderTab -->
<form name="frmMain" method="post" action="submitchangepswd.php" onSubmit="return fnValidate();">
<table width="360" height="160" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><table width="350" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #666666;">
      <tr>
        <td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#E2E2E2" style="border-bottom:1px solid #D2001E;">
            <tr>
              <td width="100%" height="25" align="left" valign="middle" background="images/tab_img_bg.gif" class="pagingbold" style="padding-left:5px;">:. CHANGE PASSWORD </td>
            </tr>
            <tr>
              <td width="100%" height="125" align="center" valign="middle" bgcolor="#fbfbfb"><table width="94%" border="0" cellspacing="4" cellpadding="4">
			      <tr>
				    <? if($message!=""){?>
                    <td width="100%" height="20" align="center" class="boldtitle" colspan="2"><span class="pagingbold"><? if(isset($message) && $message !="")  echo $message;?></span></td>
					<? }else{?>
					<td width="100%" height="20" align="center" class="boldtitle" colspan="2">&nbsp;</td>
					<? }?>
                  </tr>
                  <tr>
                    <td width="45%" height="25" align="right" class="boldtitle">Current Password : </td>
                    <td width="55%" height="25"><input name="currentpswd" type="text" class="form"></td>
                  </tr>
                  <tr>
                    <td height="25" align="right" class="boldtitle">New Password : </td>
                    <td height="25"><input name="newpswd" type="text" class="form"></td>
                  </tr>
                  <tr>
                    <td height="25" align="right" class="boldtitle">Confirm Password : </td>
                    <td height="25"><input name="confirmpswd" type="text" class="form"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input type="hidden" name="Page" value="ChangePassword"><input type="submit" name="Submit" value="Submit" class="button">
                    </td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>