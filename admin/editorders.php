<?php /**/ ?><?include("includes/header.php");
include("includes/incspaces.inc");
include("includes/functions.php");

$lang=$_REQUEST["lang"];
 if (isset($_REQUEST["uid"]) && $_REQUEST["uid"]!=0)
{
	$sqlstr = "select * from wn_orders where order_id=".$_REQUEST["uid"];
	//echo $sqlstr."<br>";	
	$myResult = mysql_query($sqlstr);
	if($rs = mysql_fetch_array($myResult))
	{
		$order_id			= $rs["order_id"];
		$pay_type	= $rs["pay_type"];
		$saluation	= $rs["saluation"];
		$chold_name	= $rs["chold_name"];
		$company	= $rs["conmpany"];
		$addr_1	    	= $rs["addr_1"];
		$addr_2	= $rs["addr_2"];
		$city		= $rs["city"];
		$state		= $rs["state"];
		$zip		= $rs["zip"];
		$country	= $rs["country"];
		$email		= $rs["email"];
		$phone 		= $rs["phone"];
		$mobile	= $rs["mobile"];
		$order_total	= $rs["order_total"];
		$order_date	= $rs["order_date"];
		$order_status		= $rs["order_status"]; 
		
 	}
}
?>
<script language=javascript>
function fnValidate(id)
{	
	var lang= document.frmFinal.lang.value
	if(id==1)
	{
		document.frmFinal.action="submitorders.php?app="+id+"&lang="+lang;
	}
	else
	{
		document.frmFinal.action="submitorders.php?app="+id+"&lang="+lang;
	}
	document.frmFinal.submit();
}	

function fnOrderPopup(id1) {
        url1="orders.php?uid="+id1
			//alert(url1)
            var attributes="";
            var WinWidth = 1000;
            var WinHeight = 650;
            
            if ((WinWidth != 800) && (WinHeight != 572))
		        WinVars = 'toolbar=no,menubar=yes,scrollbars=yes,width='+escape(WinWidth)+',height='+escape(WinHeight)+',top=100,left=100';
	        else
		        WinVars = 'toolbar=no,menubar=yes,scrollbars=yes,top=100,left=100';
        
        //alert(WinVars)
        window.open(url1,"Print Order",WinVars);
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
<TD align="center"> <form>
<input type="button" value="Print this page" onClick="fnOrderPopup(<?=$_REQUEST["uid"]?>);">
</form> </TD> 

<td width="30px"></td>
		  	<? if($_REQUEST[tType]=="Edit"){ ?>
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
            <TD align="center">&nbsp;</TD><? } ?>
            <TD align="center"><A class=toolbar             
            href="vieworders.php"><IMG 
            src="images/cancel_f2.png" alt=Cancel name=help width="32" height="32" border=0 
            align=middle 
            title=Help> <BR>
              Cancel</A>              </TD>
          </TR></TBODY>
      </TABLE></TD>
    </TR></TBODY></TABLE></td>
	 </tr>
   <tr>
    <td width="100%" height="40" align="left" valign="bottom">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:30px;">
      <tr>
       <td class="innerpageheading" height="40"><?=$lang_name?> Orders :</td>
      </tr>	  
	  <tr>
	    <td width="100%" height="17" align="center" valign="middle" class="pagingbold">
		<font color="red"><?if($_REQUEST["va"]==1){echo "New Product Added Succussfully";}else if($_REQUEST["va"]==2){echo "Order Details modified successfully";}?></font></td>
	  </tr>
    </table></td>
    <td width="49%" height="25" align="right" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="100%" colspan="2" align="center" valign="top">
	<table width="96%" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="100%" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">          
          <tr>
            <td valign="top">
			<form name="frmFinal" method="post">
			<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#E2E2E2" style="border-bottom:1px solid #D2001E;">
              <tr>
                <td width="100%" height="25" align="left" valign="middle" background="images/tab_img_bg.gif" class="tableheading" style="padding-left:25px;"><?=$_REQUEST["tType"]?> <?=$lang_name?> Order Details </td>
              </tr>
				<input type="hidden" name="uid" value="<?=$_REQUEST["uid"]?>">
				<input type="hidden" name="pg" value="<?=$_REQUEST["pg"]?>">
				<input type="hidden" name="tType" value="<?=$_REQUEST["tType"]?>">
              <tr>
                <td width="100%" align="center" valign="top" bgcolor="#fbfbfb">
				<table width="60%" border="0" align="left" cellpadding="1" cellspacing="1">
				<tr><td width="100%" height="25" align="left" valign="middle" class="tableheading" style="padding-left:15px;" colspan="2">Order Details </td>
				</tr>
                  <tr>
                    <td width="17%" height="25" align="left" valign="middle" style="padding-left:15px;">Order No : </td>
                    <td width="48%" height="25" align="left"><?=$_REQUEST["uid"]?></td>
                    </tr>
                  <tr>
                    <td height="25" align="left" valign="middle"  style="padding-left:15px;">Oreder Date : </td>
					   <td height="25" align="left">
					   <?
						$odate=explode("-",$order_date);
						$orderdate = $odate[1]."-".$odate[2]."-".$odate[0];
						echo $orderdate;
						?>
					   </td>
                    </tr>
		 			<tr>
                    <td width="17%" height="25" align="left" valign="middle" style="padding-left:15px;">Order Status : </td>
                    <td width="48%" height="25" align="left"><font color="red">
					<? if($_REQUEST[tType]=="Edit"){ ?>
					<select name="status" class="form1">
					<option value="pending" <? if($order_status=='pending'){ echo "selected";}?>>Pending</option>
					<option value="processed" <? if($order_status=='processed'){ echo "selected";}?>>Processed</option>
					<option value="rejected" <? if($order_status=='rejected'){ echo "selected";}?>>Rejected</option>
					</select>
					<? } else {
					echo $order_status;
					   } ?>
					</font></td>
                    </tr>
					
                 </table></td>
                </tr>

				<tr><td width="100%" align="center" valign="top" bgcolor="#fbfbfb">&nbsp;</td>
				</tr>
			  
			  <tr><td width="100%" align="center" valign="top" bgcolor="#fbfbfb">&nbsp;</td>
			  </tr>

				<tr><td width="100%" align="center" valign="top" bgcolor="#fbfbfb">
				<table width="60%" border="0" align="left" cellpadding="1" cellspacing="1">
				<tr>
                <td width="50%" align="center" valign="top" bgcolor="#fbfbfb">&nbsp;</td>				
                </tr>
			  </table></td></tr>
            </table> 		</form></td>
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
	    <?include("includes/footer.php");?>
		<!--footer starts from here -->
	</td>
  </tr>
</table>
</body>
</html>