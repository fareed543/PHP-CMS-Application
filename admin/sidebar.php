<? 
include('latest-info.php');
?>
<div class="box">
<h2><? echo $all["img_headline"] ?></h2>

<div class="slider-bg"> 

<div class="image-additional">
<div class="gallery gallery1">
	<div class="holder">
	  <ul style="margin-left: 0px;">

<? 
include('latest-info.php');
while($r = mysql_fetch_array($myResult))
{
?>

<li><a onclick="return hs.expand(this)" class="highslide" href="">
<img title="" alt="" src="products/<? echo $r["image"] ?>" ></a></li>

<? } ?>
	
</ul>
	</div>	