<?php /**/ ?><?include("includes/header.php");
if(!isset($total_count)) {
$total_count="0";
$item_count="0";
$num_items=0;
}
$pagelimit=20;

$count_que="select count(*) from wn_bookbreathwrk";
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
			$message="New bookbreathwork details Added";
			break;
		case '2':
			$message="Selected bookbreathwork details Modified";
			break;
		case '3':
			$message="Selected bookbreathwork details Deleted";
			break;
		case '4':
			$message="You don't have Update permissions.";
			break;
		default:
			$message="You don't have Update permissions";
			break;
	}
}
if(!isset($sortby)) { $sortby="book_id";}

 if ($disType == "") {
    $disType = "asc";
} elseif ($disType == "asc") {
    $disType = "desc";
} elseif ($disType == "desc") {
    $disType = "asc";
}
$strSql="select * from wn_bookbreathwrk order by $sortby $disType limit $limit1,$pagelimit";
$re=mysql_query($strSql);
$count=mysql_num_rows($re);
if($total_count!=0)
	{
		$intpagecount=ceil($total_count/$pagelimit);		
	}
	else $intpagecount=1;
?>


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
        <td height="40" ><span class="innerpageheading">Breathwork : </span><span class="innerpageheading1"></span></td>
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
            <td height="25"><table width="100%" height="25" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="25%" align="left" style="padding-left:25px;"><strong>Number of breathworks ( <?=$total_count?> )</strong> </td>
				 <td width="50%" align="center" class="pagingbold"><font color="red"><?if(isset($message)){ echo $message;}?></font></td>
                <td width="25%" align="right" style="padding-right:20px;"><?if($total_count>$pagelimit) {?><strong>Page <span class="pagingbold"><?=$pg?></span> of <span class="pagingbold"><?=$intpagecount?></span></strong><?}?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
		  <?$myurl = $_SERVER["PHP_SELF"]."?pg=".$pg."&disType=".$disType;
		  if($total_count <> 0){?>
		  <tr>
            <td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor=" #1E8147" style="border-bottom:1px solid #064787;">
              <tr>
                <td width="1%" height="20" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading">#</td>
                <td width="1%" height="20" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><input type="checkbox" name="checkall" onClick="Checkall()"/></td>
               <td height="20%" width="30%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=pageinclude"?>" class="link3">Page Include</a><a href="<?=$myurl."&sortby=book_id"?>" class="link3"></a></td>    
				<td height="20%" width="30%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=name"?>" class="link3">Name</a><a href="<?=$myurl."&sortby=book_id"?>" class="link3"></a></td>
				<td height="20%" width="30%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=book_contact"?>" class="link3">Contact</a><a href="<?=$myurl."&sortby=book_id"?>" class="link3"></a></td>
				<td height="20%" width="30%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=book_email "?>" class="link3">Contact</a><a href="<?=$myurl."&sortby=book_id"?>" class="link3"></a></td>
				<td height="20%" width="30%" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading"><a href="<?=$myurl."&sortby=breathwrksessions  "?>" class="link3">Contact</a><a href="<?=$myurl."&sortby=book_id"?>" class="link3"></a></td>
				</tr>
				
				
				
                 <?
				$i=1;
				if($pg!=1)
				{
					$i+=($pg-1)*$pagelimit;
				}
				while($rs=mysql_fetch_Array($re)){
				if($c%2==1){ $color="#F8F8F8";}
				 else{$color="#FFFFFF";}		
				?>
              <tr>
                <td height="20" width="1%" align="center" bgcolor="<?=$color?>"><?=$i?></td>
                <td height="20" width="1%" align="center" bgcolor="<?=$color?>">
				<input type="checkbox" name="selectcheck" value="<?=$rs["book_id"]?>"/></td>
                <td height="20" width="30%" align="center" bgcolor="<?=$color?>" style="padding-left:10px;"><?=$rs["pageinclude"]?></td>
				<td height="20" width="30%" align="center" bgcolor="<?=$color?>" style="padding-left:10px;"><?=$rs["name"]?></td>
				<td height="20" width="30%" align="center" bgcolor="<?=$color?>" style="padding-left:10px;"><?=$rs["book_contact"]?></td>
				<td height="20" width="30%" align="center" bgcolor="<?=$color?>" style="padding-left:10px;"><?=$rs["book_email"]?></td>
				<td height="20" width="30%" align="center" bgcolor="<?=$color?>" style="padding-left:10px;"><?=$rs["breathwrksessions"]?></td>
                </tr>
				<?$i=$i+1;$c++;}?>
            </table></td>
          </tr>
          <?}else{?>
		  <tr>
            <td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#E2E2E2" style="border-bottom:1px solid #810a47;">
              <tr>
                <td width="100%" height="20" align="center" valign="middle" background="images/tab_img_bg.gif" class="tableheading" colspan="9">&nbsp;</td>
              </tr>
              <tr>
                <td height="100" align="center" bgcolor="#FFFFFF" colspan="9" class="pagingbold">Currently No Workshops To Display</td>
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
            <td height="25" align="center"><?if($pg>1){?><a href="view_bookbreathwork.php?pg=1&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">&lt;&lt; Start</a><?}else{?><span class="link3">&lt;&lt; Start</span><?}?>&nbsp;&nbsp;<?if($pg>1){?><a href="view_bookbreathwork.php?pg=<?=$pg-1?>&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">&lt; Previous&nbsp;</a><?}else{?><span class="link3">&lt; Previous&nbsp;</span><?}?> | <?if($intpagecount>$pg){?>&nbsp;<a href="view_bookbreathwork.php?pg=<?=$pg+1?>&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">Next &gt;</a><?}else{?>&nbsp;<span class="link3">Next &gt;</span><?}?> <?if($intpagecount>$pg){?>&nbsp;<a href="view_bookbreathwork.php?pg=<?=$intpagecount?>&disType=<?=$disType1?>&sortby=<?=$sortby?>" class="link3">End &gt;&gt;</a><?}else{?>&nbsp;<span class="link3">End &gt;&gt;</span><?}?></td>
          </tr>
		  <?}else{?>
		  <tr>
            <td height="25" align="center">&nbsp;</td>
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