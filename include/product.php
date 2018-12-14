<div class="productside-box">

<div class="productside">
<h5>Products</h5>
<?php
$q = mysql_query("select * from wn_product order by id desc limit 0,3") or die ("error in image");
while($r = mysql_fetch_assoc($q)){
?>
<div class="product-img"><img src="products/<?php echo $r['image']; ?>" height="100" width="100" /></div>
<?php } ?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>

<div class="clear"></div>
</div>