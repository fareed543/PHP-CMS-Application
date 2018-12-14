<?php /**/ ?><? include("includes/header.php");
include("includes/incspaces.inc");
include("fckeditor/fckeditor.php");
if (isset($_REQUEST["uid"]) && $_REQUEST["uid"]!=0)
{
	$sqlstr = "select * from wn_subscribers ";
	//echo $sqlstr;
	$myResult = mysql_query($sqlstr);
	if($rs = mysql_fetch_array($myResult))
	{
		/*//$ename		= $rs["e_name"];
		$image  =stripslashes($rs["image"]);
		$pid  =stripslashes($rs["id"]);
		$prod_name =stripslashes($rs["prod_name"]);
		$title  =stripslashes($rs["title"]);
		$prod_desc   =stripslashes($rs["prod_desc"]);
		$prod_features   =stripslashes($rs["prod_features"]);
		//$pid  =stripslashes($rs["photogallery_id"]);
		
		// $in_desc =stripslashes($rs["in_desc"]);
		// $in_name  =stripslashes($rs["in_name"]); */
		
	}
}
?>
<script language=javascript>
function fnValidate(id)
{

	
	var iid=document.frmFinal.subject.value;
		if(iid==''){
		alert('please Write the Subject');
		return false;
		}
	var iid=document.frmFinal.disc.value;
		if(iid==''){
		alert('please Write the Discription');
		return false;
		}

	if(id==2)
	{
		document.frmFinal.action="sendemail.php";
	}
	
	else
	{
		document.frmFinal.action="sendemail.php";
	}
	document.frmFinal.submit();
}	

function fnprp(val)
{
	//alert(document.frmFinal.chk_prp.checked)
	
}



</script>
<tr>
<td height="100%" align="center" valign="top">
<!--body starts from here -->
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="container">
<tr>
<td height="100%" align="center" valign="middle"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
   <td height="30" colspan="2" align="right" valign="top"><TABLE class=icontable cellSpacing=0 cellPadding=0 width="100%" border=0 >
  <TBODY>
  <TR>
    <td width="35%" align="left" valign="bottom">&nbsp;</td>
    <TD width="65%" align="right">
      <TABLE id=toolbar cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
          <TR vAlign=center align=middle>
            <TD align="center"><A class=toolbar 
            href="#" onclick="fnValidate(2)"><IMG 
            src="images/save_f2.png" alt=Send name=unpublish width="32" height="32" border=0 
            align=middle 
            title=Unpublish> <BR>
              send</A> </TD>
            <TD align="center">&nbsp;</TD>
            <TD align="center"><A class=toolbar href="viewsubscribers.php"><IMG 
            src="images/cancel_f2.png" alt=Cancel name=help width="32" height="32" border=0 
            align=middle 
            title=Help> <BR>
              Cancel</A>              </TD>
          </TR></TBODY>
      </TABLE></TD>
    </TR></TBODY></TABLE></td>
	 </tr>
  <tr>
    <td width="51%" height="40" align="left" valign="bottom"><table border="0" cellspacing="0" cellpadding="0" style="margin-left:30px;">
      <tr>
        <td class="innerpageheading" height="40">Content Management : Email Subscribers</td>
        </tr>
    </table></td>
    <td width="49%" height="25" align="right" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="100%" colspan="2" align="center" valign="top"><table width="96%" height="100%" border="0" cellpadding="0" cellspacing="0">
     
      <tr>
        <td height="100%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td valign="top">
<form name="frmFinal" method="post" enctype="multipart/form-data" onSubmit="return validate();">
			<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#E2E2E2" style="border-bottom:1px solid #D2001E;">
              <tr>
                <td width="100%" height="25" align="left" valign="middle" background="images/tab_img_bg.gif" class="tableheading" style="padding-left:25px;"><?=$_REQUEST["tType"]?>Compose Mail </td>
                </tr>
				<input type="hidden" name="uid" value="<?=$_REQUEST["uid"]?>">
				<input type="hidden" name="pg" value="<?=$_REQUEST["pg"]?>">
				<input type="hidden" name="tType" value="<?=$_REQUEST["tType"]?>">
              <tr>
                <td width="100%" height="250" align="center" valign="top" bgcolor="#fbfbfb"><table width="60%" border="0" align="left" cellpadding="1" cellspacing="1">        
              <tr>
                    <td width="12%" height="25" align="left" valign="middle" style="padding-left:15px;"> Select Subscribers  : </td>
<td height="25" colspan="2" align="left">
<select name="subscribers[]"  size="10" multiple>
<?
    include ("includes/connection.php");
	$sqlstr = "select * from wn_subscribers";
	$myResult = mysql_query($sqlstr);
	while($all = mysql_fetch_array($myResult))
	{
?>

<option value="<? echo $all["email"]; ?>"><? echo $all["email"]; ?></option>

<?	} ?></select>
<!--<input name="name" type="text" class="form" value="<?=$prod_name ?>" size="60" /></td>
-->



                  </tr>
				  <tr>
                    <td width="12%" height="25" align="left" valign="middle" style="padding-left:15px;"> Email <br />Subject : </td>
                    <td height="25" colspan="2" align="left" >
                      <textarea name="subject" type="text" class="form" rows="5" cols="57" /><?=$prod_desc ?></textarea></td>
                  </tr>
				  <tr>
                    <td width="12%" height="25" align="left" valign="middle" style="padding-left:15px;"> Email <br />Message  : </td>
                    <td height="25" colspan="2" align="left">
                      <textarea name="disc" type="text" class="form" rows="5" cols="57" /><?=$prod_desc ?></textarea></td>
                  </tr>

                    </table></td></tr>
			</table></form></td>
          </tr>
         </table></td>
      </tr>
      <tr>
        <td height="20">&nbsp;</td>
      </tr>
    </table></td>
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