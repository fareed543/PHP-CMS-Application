<? 
include('latest-info.php');
?>
<div class="box">
<h3>Our Experts</h3>

<div class="slider-bg"> 

<div class="image-additional">
<div class="gallery gallery1">
	<div class="holder">
	  <ul style="margin-left: 0px;">

<?
    include ("admin/includes/connection.php");
	$sql = "select * from wn_expert order by photo_id DESC ";
	$myR = mysql_query($sql);
	
while($rs = mysql_fetch_array($myR))
{
?>
<li><a onclick="return hs.expand(this)" class="highslide" href="http://<? echo $rs["link"] ?>">
<img title="" alt="" src="uploads/<? echo $rs["image"] ?>" ></a></li>

<? } ?>
	
</ul>
	</div>	