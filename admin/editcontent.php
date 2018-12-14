<?php /**/ ?><? include("includes/header.php");
include("includes/incspaces.inc");
include("includes/functions.php");
include("fckeditor/fckeditor.php");
$uid=$_REQUEST["uid"];

if(isset($uid) && $uid !="")
{
	$sqlstr = "select * from wm_cms where page_id=$uid";
	$mynews = mysql_query($sqlstr);
	if ($rs = mysql_fetch_array($mynews)) {
	$pagename	 = stripslashes($rs["page_name"]);
	$description = stripslashes($rs["page_desc"]);
	$meta_title = stripslashes($rs["meta_title"]);
	$meta_keywords = stripslashes($rs["meta_keywords"]);
	$meta_description = stripslashes($rs["meta_description"]);
	
}
}
?>
<script language=javascript>
function fnValidate(id)
{
	if(document.frmFinal.txtHead.value=="")
	{
		alert("Enter Page Name")

		document.frmFinal.txtHead.focus()
		return false
	}
	if(document.frmFinal.meta_title.value=="")
	{
		alert("Enter Meta Title")

		document.frmFinal.meta_title.focus()
		return false
	}
	if(id==1)
	{
		document.frmFinal.action="submitcontent.php?app="+id;
	}
	else
	{
		document.frmFinal.action="submitcontent.php?app="+id;
	}
	document.frmFinal.submit();
	
}
function fnBig(imgWidth,imgHeight)
	{
	//alert(document.frmFinal.fckeditor.value);	
	document.frmFinal.pagecontent.value=document.frmFinal.fckeditor.value;

	var WinWidth = parseInt(imgWidth) + 50;
	var WinHeight = parseInt(imgHeight) + 50;
		
		if ((WinWidth <= 800) && (WinHeight <= 572))
			WinVars = 'toolbar=no,menubar=no,width='+escape(WinWidth)+',height='+escape(WinHeight)+',top=0,left=0';
		else
			WinVars = 'toolbar=no,menubar=no,scrollbars=yes,top=0,left=0';
	s="preview.php?pagecontent="+document.frmFinal.pagecontent.value;	
	window.open(s,'IMAGE',WinVars);	

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
            <!-- <TD align="center"><A class=toolbar href="javascript:fnBig('500','500')"><IMG 
            src="images/preview_f2.png" alt=Archive name=archive width="32" height="32" border=0 
            align=middle 
            title=Archive> <BR>
              Preview</A> </TD>
            <TD align="center">&nbsp;</TD> -->
            <TD align="center"><A class=toolbar 
            href="#" onclick="return fnValidate(0)"><IMG 
            src="images/save_f2.png" alt=Save name=unpublish width="32" height="32" border=0 
            align=middle 
            title=Save> <BR>
              Save</A> </TD>
            <TD align="center">&nbsp;</TD>
            <TD align="center"><A class=toolbar 
            href="#" onclick="return fnValidate(1)"><IMG 
            src="images/apply_f2.png" alt=Apply name=remove width="32" height="32" border=0 
            align=middle 
            title=Apply> <BR>
              Apply</A> </TD>
            <TD align="center">&nbsp;</TD>
            <TD align="center"><A class=toolbar             
            href="viewcontent.php"><IMG 
            src="images/cancel_f2.png" alt=Cancel name=help width="32" height="32" border=0 
            align=middle 
            title=Cancel> <BR>
              Cancel</A>              </TD>
          </TR></TBODY>
      </TABLE></TD>
    </TR></TBODY></TABLE></td>
	 </tr>
  <tr>
    <td width="51%" height="40" align="left" valign="bottom"><table border="0" cellspacing="0" cellpadding="0" style="margin-left:30px;">
      <tr>
        <td class="innerpageheading" height="40">Content Item :</td>
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
			<form name="frmFinal" method="post">
			<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#E2E2E2" style="border-bottom:1px solid #D2001E;">
              <tr>
                <td width="100%" height="25" align="left" valign="middle" background="images/tab_img_bg.gif" class="tableheading" style="padding-left:25px;">Item Details </td>
                </tr>
              <tr>
                <td width="100%" height="250" align="center" valign="top" bgcolor="#fbfbfb"><table width="60%" border="0" align="left" cellpadding="1" cellspacing="1">
                  <tr>
                    <td width="17%" height="25" align="left" valign="middle" style="padding-left:15px;">Title  : </td>
                    <td height="25" colspan="2" align="left">
                      <input name="txtHead" type="text" class="form" value="<?=$pagename?>" size="60" /></td>
                  </tr>
                  <tr>
                    <td height="25" colspan="2" align="left" valign="middle"  style="padding-left:15px;>&nbsp; </td>
                    <td height="25">Content : </td>
                  </tr>
                  <tr>
                    <td height="25" colspan="3" align="left" valign="middle"  style="padding-left:15px;">
					<?
						$sBasePath ="fckeditor/";
						$oFCKeditor = new FCKeditor('fckeditor') ;
						$oFCKeditor->BasePath	= $sBasePath ;
						if(isset($_REQUEST["uid"]) && $_REQUEST["uid"]!="")
						$oFCKeditor->Value = $description;
						else 
						$oFCKeditor->Value="";
						$oFCKeditor->Create();
					?>
					</td>
                  </tr>
				  <tr>
                    <td width="17%" height="25" align="left" valign="middle" style="padding-left:15px;">Meta Title  : </td>
                    <td height="25" colspan="2" align="left">
                      <input name="meta_title" type="text" class="form" value="<?=$meta_title?>" size="60" /></td>
                  </tr>
				  <tr>
                    <td height="25" align="left" valign="middle"  style="padding-left:15px;">Meta Keywords : </td>
                    <td height="25" align="left">
					<textarea name="meta_keywords" class="form" rows="5" cols="80"><?=$meta_keywords?></textarea>
					</td>
                    </tr>
					<tr>
                    <td height="25" align="left" valign="middle"  style="padding-left:15px;">Meta Description : </td>
                    <td height="25" align="left">
					<textarea name="meta_description" class="form" rows="5" cols="80"><?=$meta_description?></textarea>
					</td>
                    </tr>
	              <tr>
                    <td height="25" colspan="3" align="left" valign="middle"  style="padding-left:15px;">&nbsp;</td>
                  </tr>
                  <input type="hidden" name="uid" value="<?=$_REQUEST["uid"]?>">
					<input type="hidden" name="pg" value="<?=$_REQUEST["pg"]?>">
					<input type="hidden" name="tType" value="<?=$_REQUEST["tType"]?>">
					<input type="hidden" name="pagecontent">
				
                </table></td>
                </tr>
              

            </table>
</form>
			</td>
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