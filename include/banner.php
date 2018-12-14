<div class="banner-main"><!--banner-main start-->
<div class="fixed-div">
<div class="banner"><!--banner start-->
<div class="logo"><!--logo start-->

<a href="index.php"><img src="images/logo.png" alt="logo" title="Law's CMA"  /></a>
<!--logo end--></div>
<?php
$q = mysql_query("select * from wn_photo where photogallery_id='7'") or die ("error in banner");
while($r = mysql_fetch_assoc($q))
{
	//echo "value of ".$_SERVER['DOCUMENT_ROOT']."/"."localhost"."/"."lcma"."/"."uploads".$r['image'];
?>
  <div class="banner-slider"><img src="uploads/<?php echo $r['image']; ?> " width="782" height="277" /></div>  

<!-- <div class="banner-slider"><img src="images/banner-1.png" width="782" height="277" /></div>
 --><?php
}
?>
<!--banner end--></div>
</div>
<!--banner-main end--></div>