<?php /**/ ?><? include("includes/header.php");
include("includes/incspaces.inc");
include("fckeditor/fckeditor.php");
if (isset($_REQUEST["uid"]) && $_REQUEST["uid"]!=0)
{
	$sqlstr = "select * from wn_index where in_id=".$_REQUEST["uid"];
	$myResult = mysql_query($sqlstr);
	if($rs = mysql_fetch_array($myResult))
	{
		//$ename		= $rs["e_name"];
		$in_image  =stripslashes($rs["in_image"]);
		// $in_desc =stripslashes($rs["in_desc"]);
		// $in_name  =stripslashes($rs["in_name"]);
		
	}
}
?>
<script language=javascript>
function fnValidate(id)
{
	
	
	if(id==1)
	{
		document.frmFinal.action="submitadvs.php?app="+id;
	}
	else
	{
		document.frmFinal.action="submitadvs.php?app="+id;
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
            href="#" onclick="fnValidate(0)"><IMG 
            src="images/save_f2.png" alt=Save name=unpublish width="32" height="32" border=0 
            align=middle 
            title=Unpublish> <BR>
              Save</A> </TD>
            <TD align="center">&nbsp;</TD>
            <TD align="center"><A class=toolbar 
            href="#" onclick="fnValidate(1)"><IMG 
            src="images/apply_f2.png" alt=Apply name=remove width="32" height="32" border=0 
            align=middle 
            title=Remove> <BR>
              Apply</A> </TD>
            <TD align="center">&nbsp;</TD>
            <TD align="center"><A class=toolbar             
            href="viewadvs.php"><IMG 
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
        <td class="innerpageheading" height="40">Content Management : Home Banners</td>
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
			<form name="frmFinal" method="post" enctype="multipart/form-data">
			<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#E2E2E2" style="border-bottom:1px solid #D2001E;">
              <tr>
                <td width="100%" height="25" align="left" valign="middle" background="images/tab_img_bg.gif" class="tableheading" style="padding-left:25px;"><?=$_REQUEST["tType"]?> Banner Details </td>
                </tr>
				<input type="hidden" name="uid" value="<?=$_REQUEST["uid"]?>">
				<input type="hidden" name="pg" value="<?=$_REQUEST["pg"]?>">
				<input type="hidden" name="tType" value="<?=$_REQUEST["tType"]?>">
              <tr>
                <td width="100%" height="250" align="center" valign="top" bgcolor="#fbfbfb"><table width="60%" border="0" align="left" cellpadding="1" cellspacing="1">
                
                
                <!-- <tr>
                    <td width="12%" height="25" align="left" valign="middle" style="padding-left:15px;">Title  : </td>
                    <td height="25" colspan="2" align="left">
                      <input name="in_name" type="text" class="form" value="<?=$in_name?>" size="60" /></td>
                  </tr>-->
                 <tr>
						<td width="12%" height="25" align="left" valign="middle" style="padding-left:15px;">  Image : </td>
						<td width="45%" height="25" align="left" style="padding-left:0px;">
				   <input name="in_image" type="file" >&nbsp;<a href="#" class="tt"><?echo $in_image; ?><span class="tooltip"><img src="http://localhost/nav/uploads/<?=$in_image?>" border="0"></span></a>
                                               <input name="previmg" type="hidden" value="<?=$in_image?>" >

					</td>
                    </tr> 
                    
              <!--  <tr>
                 <td width="17%" height="25" align="left" valign="middle" style="padding-left:15px;">Description : </td>
                    <td height="25" colspan="3" align="left" valign="middle"  style="padding-left:15px;">
					<?
						$sBasePath ="fckeditor/";
						$oFCKeditor = new FCKeditor('fckeditor') ;
						$oFCKeditor->BasePath	= $sBasePath ;
						if(isset($_REQUEST["uid"]) && $_REQUEST["uid"]!="")
						$oFCKeditor->Value = $in_desc;
						else 
						$oFCKeditor->Value="";
						$oFCKeditor->Create();
					?>
					</td>
                  </tr>-->
                    
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