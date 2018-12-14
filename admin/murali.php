<?php /**/ ?><?include("includes/header.php");

$sql=mysql_query('select *from murali_tst')or die(mysql_error());
$sql1=mysql_query('select count(*)from murali_tst');
$res=mysql_fetch_array($sql1);
$total_count=$res[0];



?>
<script>
function fnAdd()
{
	window.location.href="muraliedittst.php?tType=Add";
}
function fnDetails()
{

	var obj=document.frmMain.elements;
	flag=0;
    for(var i=0;i<obj.length;i++)
	{
	   if(obj[i].name=="selectcheck" && obj[i].checked)
	   {
			flag=1;
			break;
	   }
    }
	if(flag==0)
	{
	alert("Please make a selection from a list to Edit");
	}else if(flag==1)
	{
	var checkedvals="";
	for(var i=0;i<obj.length;i++){
	   if(obj[i].checked==true){
		  checkedvals = checkedvals+","+obj[i].value;
	   }
	}
	var checkvals = checkedvals.substr(1);
    var arrval = checkvals.split(",");
	if(arrval.length > 1)
	{
		alert("Select Only One checkbox to edit");
	}
	else
	{
		window.location.href="muraliedittst.php?tType=Edit&pg=<?=$pg?>&uid="+arrval[0];
	}
	}

}

</script>
<script language="javascript">
function Checkall()
{

	if(document.frmMain.checkall.checked==true)
	{
		var obj=document.frmMain.elements;
		for(var i=0;i<obj.length;i++)
		{
			if((obj[i].name=="selectcheck") && (obj[i].checked==false))
			{
			obj[i].checked=true;
			}
		}
	}
	else if(document.frmMain.checkall.checked==false)
	{
		var obj=document.frmMain.elements;
		for(var i=0;i<obj.length;i++)
		{
			if((obj[i].name=="selectcheck") && (obj[i].checked==true))
			{
			obj[i].checked=false;
			}
		}
	}
}
function fnDelete()
{	
	var obj=document.frmMain.elements;
	flag=0;
    for(var i=0;i<obj.length;i++)
	{
	   if(obj[i].name=="selectcheck" && obj[i].checked)
	   {
			flag=1;
			break;
	   }
    }
	if(flag==0)
	{
		alert("Select Checkbox to Delete");
	}else if(flag==1)
	{
			var i,len,chkdelids,sep;
			  chkdelids="";
			  sep="";
				for(var i=0;i<document.frmMain.length;i++)
				{
					if(document.frmMain.elements[i].name=="selectcheck")
					{
						if(document.frmMain.elements[i].checked==true)
						{
							//alert(document.frmFinal.elements[i].value)
							chkdelids = chkdelids + sep + document.frmMain.elements[i].value;
							sep=",";
						}
					}
				}	
				ConfirmStatus = confirm("Do you want to DELETE selected testimonial?")

                if (ConfirmStatus == true) {

				document.frmMain.chkdelids.value=chkdelids
				document.frmMain.tType.value="Del"
				document.frmMain.action="muralisubmittst.php";
				document.frmMain.submit()		 
     }
	 
	 }
}

</script>
  <tr>
    <td height="100%" align="center" valign="top">
	<!--body starts from here -->
	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="container">
  <tr>
    <td height="100%" align="center" valign="middle"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
	 <tr>
       <td height="30" colspan="3" align="right" valign="top"><TABLE class=icontable cellSpacing=0 cellPadding=0 width="100%" border=0 >
		<TBODY>
		  <TR>
			<td width="35%" align="left" valign="bottom">&nbsp;</td>
			<TD width="65%" align="right">
			  <TABLE id=toolbar cellSpacing=0 cellPadding=0 border=0>
				<TBODY>
				  <TR vAlign=center align=middle>
					  <TD align="center"><A class=toolbar href="javascript: fnAdd();"><IMG src="images/new_ico.png" alt=New width="32" height="32" border=0 align=middle id="Add"><BR>New</A></TD>
					  <TD align="center">&nbsp;</TD>
					  <TD align="center"><A class=toolbar href="javascript: fnDetails();"><img src="images/addedit1.png" alt="Edit" name="help" width="32" height="32" border="0" align="middle"/><BR>Edit</A></TD>
					  <TD align="center">&nbsp;</TD>
					  <TD align="center"><A class=toolbar href="javascript:fnDelete();"><IMG src="images/trash1.png" alt=Delete width="32" height="32" border=0 align=middle><BR>Trash</A></TD>
				  </TR>
				</TBODY>
			  </TABLE></TD>
			</TR>
		 </TBODY></TABLE>	   </td>
	 </tr>
  <tr>
    <td width="25%" height="40" align="left" valign="middle"><table border="0" cellspacing="0" cellpadding="0" style="margin-left:30px;">
	  <tr>
        <td height="40" ><span class="innerpageheading">Content Management : </span><span class="innerpageheading1">Testimonial</span></td>
      </tr>
    </table></td>
  
  </tr>
  <tr>
    <td height="100%" colspan="3" align="center" valign="top"><table width="96%" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="100%" valign="top">
		<form name="frmMain" method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="25" bgcolor="F5F5F5"><table width="100%" height="25" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="25%" align="left" bgcolor="#F5F5F5" style="padding-left:25px;"><strong>Testimonial ( <?php echo$total_count;?> )</strong> </td>
				 <td width="50%" align="center" bgcolor="#F5F5F5" class="pagingbold"><font color="red"><?if(isset($message)){ echo $message;}?></font></td>
                <td width="25%" align="right" bgcolor="#F5F5F5" style="padding-right:20px;"><?if($total_count>20) {?><strong>Page <span class="pagingbold"><?=$pg?></span> of <span class="pagingbold"><?=$intpagecount?></span></strong><?}?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
		  <?$myurl = $_SERVER["PHP_SELF"]."?pg=".$pg."&disType=".$disType;
		  if($total_count <> 0){?>
		  <tr>
            <td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#E2E2E2" style="border-bottom:1px solid #D2001E;">
              <tr>
                <td width="10%" height="20" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading">#</td>
                <td width="5%" height="20" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><input type="checkbox" name="checkall" onClick="Checkall()"/></td>
                <td height="45%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=tst_id"?>" class="link3">Name</a> </td>
				<td height="45%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=tst_id"?>" class="link3">Title</a> </td>
				<td height="45%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=tst_id"?>" class="link3">Description</a> </td>
				<td height="45%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=tst_id"?>" class="link3">Date</a> </td>
				 	            <!-- <td height="45%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=adv_image1"?>" class="link3">Status</a> </td>-->
          
               </tr>
			  <?
				$i=1;
				if($pg!=1)
				{
					$i+=($pg-1)*$pagelimit;
				}

				while($rs=mysql_fetch_Array($sql)){
				if($c%2==1)
					 {
						 $color="#F8F8F8";
					 }
					 else
					 {
						$color="#FFFFFF";
					}		
				?>
              <tr>
                <td height="20" align="center" bgcolor="<?=$color?>"><?=$i?></td>
                <td height="20" align="center" bgcolor="<?=$color?>"><input type="checkbox" name="selectcheck" value="<?=$rs["tst_id"]?>"/></td>
                <td height="20" bgcolor="<?=$color?>" style="padding-left:10px;" align="left"><a href="edittst.php?tType=Edit&uid=<?php echo $rs["tst_id"];?>" style="color:black;cursor:pointer;text-decoration:underline;" class="tt"><?echo $rs["tst_name"]; ?><span class="tooltip"></a></td>
				 <td height="20" bgcolor="<?=$color?>" style="padding-left:10px;" align="center"><? echo $rs["tst_title"]?></td>
				  <td height="20" width="400"  bgcolor="<?=$color?>" style="padding-left:10px;" align="center"><? echo $rs["tst_desc"]?></td>
				  <td height="20" bgcolor="<?=$color?>" style="padding-left:10px;" align="center"><? echo $rs["date"]?></td>
               
                </tr>
			 

			  <?$i=$i+1;$c++;}?>
            </table></td>
          </tr>
          <?}else{?>
		  <tr>
            <td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#E2E2E2" style="border-bottom:1px solid #D2001E;">
              <tr>
                <td width="100%" height="20" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading" colspan="9">&nbsp;</td>
              </tr>
              <tr>
                <td height="100" align="center" bgcolor="#FFFFFF" colspan="9" class="pagingbold">Currently No image To Display</td>
              </tr>
            </table></td>
          </tr>
		  <?}?>
		  <input name="uid" type="hidden">
		<input type="hidden" name="tType">
		<input type="hidden" name="chkdelids">
				<?
				if ($disType == "") {
				$disType1 = "asc";
				} elseif ($disType == "asc") {
				$disType1 = "desc";
				} elseif ($disType == "desc") {
				$disType1 = "asc";
				}
				?>

		  <?if($total_count > $pagelimit){?>
          <tr>
            <td height="25" align="center" bgcolor="#F5F5F5"><?if($pg>1){?><a href="viewgallery.php?pg=1&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">&lt;&lt; Start</a><?}else{?><span class="link3">&lt;&lt; Start</span><?}?>&nbsp;&nbsp;<?if($pg>1){?><a href="viewgallery.php?pg=<?=$pg-1?>&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">&lt; Previous&nbsp;</a><?}else{?><span class="link3">&lt; Previous&nbsp;</span><?}?> | <?if($intpagecount>$pg){?>&nbsp;<a href="viewgallery.php?pg=<?=$pg+1?>&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">Next &gt;</a><?}else{?>&nbsp;<span class="link3">Next &gt;</span><?}?> <?if($intpagecount>$pg){?>&nbsp;<a href="viewgallery.php?pg=<?=$intpagecount?>&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">End &gt;&gt;</a><?}else{?>&nbsp;<span class="link3">End &gt;&gt;</span><?}?></td>
          </tr>
		  <?}else{?>
		  <tr>
            <td height="25" align="center" bgcolor="#F5F5F5">&nbsp;</td>
          </tr>
		  <?}?>
        </table>
		</form>		</td>
      </tr>
      <tr>
        <td height="20">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table></td>
  </tr>
</table>
<!--body ends here --></td>
  </tr>
  <tr>
    <td height="29" valign="top">
		<!--footer starts from here -->
	    <?include("includes/footer.php");?>
		<!--footer starts from here -->
	</td>
  </tr>
</table>
</body>
</html>