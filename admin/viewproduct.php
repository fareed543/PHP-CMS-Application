<?php /**/ ?><?include("includes/header.php");
if(!isset($total_count)) {
$total_count="0";
$item_count="0";
$num_items=0;
}
$pagelimit=20;

$count_que="select count(*) from wn_product";
$count_result=mysql_query($count_que);
$count_res=mysql_fetch_array($count_result);
$total_count=$count_res[0];

$pg=$_GET["pg"];
$disType=$_GET["disType"];
$sortby=$_GET["sortby"];
if($_REQUEST["c"] == ""){
	$c = 1;
}else{
	$c = $_REQUEST["c"];
}

if((isset($pg))&& $pg!=""){
	   $pg=$pg;	  	   
    }else{
       $pg="1";
	}
	if($pg=="1"){
      $limit1=0;
	}else{
		$limit1=($pg-1)*$pagelimit;
	}
if(isset($_GET["va"])){
	switch($_GET["va"]){
		case '1':
			$message="New Product Added";
			break;
		case '2':
			$message="Selected Product Modified";
			break;
		case '3':
			$message="Selected Product Deleted";
			break;
		case '4':
			$message="You don't have Update permissions.";
			break;
		default:
			$message="You don't have Update permissions";
			break;
	}
}
if(!isset($sortby)) { $sortby="id";}

 if ($disType == "") {
    $disType = "asc";
} elseif ($disType == "asc") {
    $disType = "desc";
} elseif ($disType == "desc") {
    $disType = "asc";
}
$strSql="select * from wn_product order by $sortby $disType limit $limit1,$pagelimit";
$re=mysql_query($strSql);
$count=mysql_num_rows($re);
if($total_count!=0)
	{
		$intpagecount=ceil($total_count/$pagelimit);		
	}
	else $intpagecount=1;
?>
<script>
function fnAdd()
{
	window.location.href="editproduct.php?tType=Add";
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
		window.location.href="editproduct.php?tType=Edit&pg=<?=$pg?>&uid="+arrval[0];
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
				ConfirmStatus = confirm("Do you want to DELETE selected Product?")

                if (ConfirmStatus == true) {

				document.frmMain.chkdelids.value=chkdelids
				document.frmMain.tType.value="Del"
				document.frmMain.action="submitproduct.php";
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
        <td height="40" ><span class="innerpageheading">Content Management : </span><span class="innerpageheading1">Products</span></td>
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
                <td width="25%" align="left" bgcolor="#F5F5F5" style="padding-left:25px;"><strong>Products ( <?=$total_count?> )</strong> </td>
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
                
				<td height="45%" width="200" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=name"?>" class="link3">Product name</a></td>
				
		
		<td height="45%" width="200" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=name"?>" class="link3">Product Title</a></td>

				<td height="45%" width="200" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=name"?>" class="link3">Product Description</a></td>
				
	            <td height="45%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading">Product Features</td>
			
          
               </tr>
			  <?
				$i=1;
				if($pg!=1)
				{
					$i+=($pg-1)*$pagelimit;
				}

				while($rs=mysql_fetch_Array($re)){
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



                <td height="45" align="center" bgcolor="<?=$color?>"><?=$i?></td>

                <td height="20" align="center" bgcolor="<?=$color?>"><input type="checkbox" name="selectcheck" value="<?=$rs["id"]?>"/></td>

                <td height="20" bgcolor="<?=$color?>" style="padding-left:10px;" align="left"><a href="editproduct.php?tType=Edit&uid=<?php echo $rs["id"];?>" style="color:black;cursor:pointer;text-decoration:underline;" class="tt"><?echo $rs["prod_name"]; ?><span class="tooltip"><img src="../products/<?php echo $rs["image"]?>" border="1" width="300" height="200"  ></span></a></td>
              
				<td height="20" align="center" bgcolor="<?=$color?>"><?php echo $rs["title"]; ?></td>
				
				<td height="20" width="300" align="center" bgcolor="<?=$color?>">
				<?= substr($rs["prod_desc"],0,100)?>...</td>
				
				<td height="20" align="left" bgcolor="
					<?=$color?>">
<?php
					$pid = $rs["id"];
	$sqlstr1 = "select * from wn_prodfeature where prod_id = $pid";
	$myResult1 = mysql_query($sqlstr1);
	while($pro = mysql_fetch_array($myResult1))
	{
		$prod_features  =stripslashes($pro["prod_features"]);   ?>
	    <?php echo "&nbsp;&nbsp;".$prod_features."<br/>"; ?>
		
	<? }   ?>
					</td>
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
                <td height="100" align="center" bgcolor="#FFFFFF" colspan="9" class="pagingbold">Currently No Products To Display</td>
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
            <td height="25" align="center" bgcolor="#F5F5F5"><?if($pg>1){?><a href="viewphoto.php?pg=1&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">&lt;&lt; Start</a><?}else{?><span class="link3">&lt;&lt; Start</span><?}?>&nbsp;&nbsp;<?if($pg>1){?><a href="viewphoto.php?pg=<?=$pg-1?>&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">&lt; Previous&nbsp;</a><?}else{?><span class="link3">&lt; Previous&nbsp;</span><?}?> | <?if($intpagecount>$pg){?>&nbsp;<a href="viewphoto.php?pg=<?=$pg+1?>&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">Next &gt;</a><?}else{?>&nbsp;<span class="link3">Next &gt;</span><?}?> <?if($intpagecount>$pg){?>&nbsp;<a href="viewphoto.php?pg=<?=$intpagecount?>&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">End &gt;&gt;</a><?}else{?>&nbsp;<span class="link3">End &gt;&gt;</span><?}?></td>
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
