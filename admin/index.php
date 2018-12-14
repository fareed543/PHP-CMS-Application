<?php /**/ ?><?php

switch($_REQUEST['e']){
	case 1:
		$message="End of Administrator Session ";
		break;
	case 2:
		$message="Enter Admin ID and Password to sign in";
		break;
	case 3:
		$message="Authentication Failed. Please use the correct details";
		break;
	case 4:
		$message="Password Changed. Please Login With Your new Password";
		break;
	default:
		$message="Login Restricted for General Public";
		break;
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DYNAMIC TOOLS PVT. LTD.</title>
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

<link rel="stylesheet" type="text/css" href="stylesheets/chromestyle.css" />
<link href="stylesheets/adminstyles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="stylesheets/tabcontent.css" />
<style type="text/css">
<!--

h4{
font-family: Arial, Helvetica, sans-serif;
color:#000;
font-size:1.5em;
padding-top:10px;
float:left;
font-weight:bold;
height:60px;
}
.style2 {font-size: 1em}
-->
</style>
</head>

<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="131" align="left" valign="middle">
	<!--header starts from here -->
	<div id="header">
	<a href="#"><img style="float:left;" height="75" width="300" src="images/logo.png" class="logo" title="LCMA" alt="LCMA"></a>
	
	<div id="logoright">Control Panel</div>
	<div id="navbg"><div style="padding-top:8px;"><marquee class="marqueetext">
	DYNAMIC TOOLS PVT. LTD.
	</marquee></div>
	</div>
	</div>
	<!--header ends here -->
	</td>
  </tr>
  <tr>
    <td height="100%" align="center" valign="top">
	<!--body starts from here -->
	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="container">
  <tr>
    <td height="100%" align="center" valign="middle"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="100%" align="center" valign="middle">
	<span class="pagingbold"><? if(isset($message) && $message !="")  echo $message;?></span> 
	<table width="536" border="0" cellpadding="0" cellspacing="0" id="loginbox">
      <tr>
        <td width="210" align="center"><table width="90%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="left"><img src="images/login_img.jpg" width="75" height="72" /></td>
          </tr>
          <tr>
            <td align="left" class="maintext">Welcome to <strong class="pagingbold">DYNAMIC TOOLS PVT. LTD. </strong><br>
              <br>
              Use a valid username and password to gain access to the administration console.</td>
          </tr>
        </table></td>
        <td width="320" height="170" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="300" border=0 align=center cellpadding=0 cellspacing=0>
              <tbody>
                <tr>
                  <td valign=top><table cellspacing=0 cellpadding=0 width="100%" border=0>
                      <tbody>
                        <tr>
                          <td valign=middle>
						  
					<script>
function validate()
{
		var n=document.forms["frmIndex"]["uname"].value;
		if (n==null || n=="")
		  {
		  alert("Please Fill the  User Name");
		  return false;
		  }

		var n=document.forms["frmIndex"]["pword"].value;
		if (n==null || n=="")
		  {
		  alert("Please Enter the Password");
		  return false;
		  }



	
}
</script>	  
<form name="frmIndex" action="logincheck.php" method=post>
                     <table cellspacing=4 cellpadding=4 width="100%" align=center border=0 id="loginbox">
                      <tbody><tr valign=top>
                              <td align=right valign=center class="pagingbold">&nbsp;</td>
                                    <td valign="middle" >&nbsp;</td>
                                  </tr>
                                  <tr valign=top>
                                    <td height=30 align=right valign="middle" class="pagingbold">Username : </td>
                                    <td height=30 valign="middle"><input id=uname size=30 name=uname class="form1">                                                <script language="JavaScript" type="text/javascript">if(document.getElementById) document.getElementById('uname').focus();</script></td>
                                  </tr>
                                  <tr valign=top>
                                    <td height="30" align=right valign="middle" class="pagingbold"><span>Password</span> : </td>
                                    <td height=30 valign="middle" bgcolor="#FAF9F4"><input class="form1" type=password name=pword size=30></td>
                                  </tr>
                                  <tr valign=top>
                                    <td align=right valign="middle" bgcolor="#FBFBFB" class=menubold>&nbsp;<input type="hidden" name="Page" value="AdminLogin"></td>
                                    <td><input class=button type=submit value=Submit name=Submit onClick="return validate();"></td>
                                  </tr>
								      <tr valign=top>
                                    <td align=right valign="middle" bgcolor="#FBFBFB" class=menubold>&nbsp;</td>
                                    <td>&nbsp;</td>
								      </tr>
                                </tbody>
                              </table>
                          </form></td>
                        </tr>
                      </tbody>
                  </table></td>
                </tr>
              </tbody>
            </table></td>
            </tr>
        </table>
        </td>
      </tr>
    </table>
      </td>
  </tr>
</table>
</td>
    </tr>
</table>
<!--body ends here --></td>
  </tr>
  <tr>
    <td height="29" valign="top">
		<!--footer starts from here -->
	    <? include("includes/footer.php");?>
		<!--footer starts from here -->
	</td>
  </tr>
</table>
</body>
</html>