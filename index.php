<? 
include ("include/header.php");

	$sqlstr = "select * from wn_cms where cms_name = 'Home'";
	$myResult = mysql_query($sqlstr);
	if($rs = mysql_fetch_array($myResult))
	{
		//$ename		= $rs["e_name"];
		$img_desc  =stripslashes($rs["img_desc"]);
		$cms_name  =stripslashes($rs["cms_name"]);
		$sub_title  =stripslashes($rs["sub_title"]);
		$meta_title  =stripslashes($rs["meta_title"]);
		$headline  =stripslashes($rs["headline"]);
		$meta_description  =stripslashes($rs["meta_description"]);
		$meta_keywords  =stripslashes($rs["meta_keyword"]);
		$disc  =stripslashes($rs["img_desc"]);
		$latestnews  =stripslashes($rs["latestnews"]);
		$description  =stripslashes($rs["description"]);
		$mobileno=stripslashes($rs["mobileno"]);
		//$im_top = stripslashes($rs["im_top"]);
		$img = stripslashes($rs["cms_img"]);
		$image = stripslashes($rs["cms_img"]);
		// $adv_image2 =stripslashes($rs["adv_image2"]);
			//echo "surendra.........".$im_top;
	}

?>
<!-- main-menu End--></div>

<div id="main-max-banner"><!--start main-max-banner-->

<!--max banner js code start-->

<!--max banner js code end-->


<div class="max-banner">

<div id="container">

  <div id="banner-fade">


    
        <ul class="bjqs">
		  <?php
	$sqlstr = "select * from wn_product order by id DESC limit 5";
	$myResult = mysql_query($sqlstr);
	while($rs = mysql_fetch_array($myResult))
	{
		$img  =stripslashes($rs["image"]);
		/*$prod_name  =stripslashes($rs["prod_name"]);
		$title  =stripslashes($rs["title"]);
		$prod_desc  =stripslashes($rs["prod_desc"]);
		$prod_features  =stripslashes($rs["prod_features"]);
*/
?>
		  <li><a href="products.php">

		  <img src="products/<?php echo $img; ?>" border="0" title="" width="980" height="421" ></a></li>
          <?	}	  ?>
        </ul>
      </div>
      <!-- End outer wrapper -->
 <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/bjqs-1.3.min.js"></script>
      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 421,
            width       : 980,
            responsive  : true
          });

        });
      </script>

			
		</div>
		


<!--end container--></div>

<!--End main-max-banner--></div>
<div id="container"><!--container start-->
<div class="news-div">
<? 	include('latest-info.php');   ?>
<strong>Latest News:</strong> <span><?= substr($all["rec_news"],0,140) ?>......<span class="read-bg"><a href="latestnews.php"><B>Read More ></B></a></span></span></div>
<!--container end--></div>


<div class="main-content">
<div class="main-column"><!--main-max-banner start-->
<div id="container"><!--container start-->

<div id="notification"></div>

<div id="column-right"><!--column-right start-->

<? include('sidebar.php'); ?>			
				<div class="control">
				<a class="prev" href="#"></a>
				<a class="next" href="#"></a>            
				</div> 
</div>
</div>


                        <!--small_Img --></div>
                        <!--pro_detailImgs --></div>

<!--column-right End--></div>



<div id="content"><!--content start-->

<div class="box">
<div class="contact-box">

<div class="conte">

<div class="bullet-points-color-box">
<div class="out-img">
<img src="uploads/<? echo $image ?>" border="0" width="240" height="175" />  </div>
<div class="contact-box-out">
<h2><?php echo $headline; ?></h2>
<p><?php echo $disc; ?></p>

</div>

</div>

</div>
</div>
</div>



<div class="clear"></div>  
<!--container End--></div>
               
</div>

<!--main-max-banner End--></div>
</div>
<script src="js/slideGallery.js" type="text/javascript"></script>
<script type="text/javascript">
	window.addEvent("domready", function() {
		/* Example 1 */
		var gallery1 = new slideGallery($$(".gallery1"), {
			steps: 2,
			mode: "circle",
			random: true,
			autoplay: true,
			stop: ".stop",
			start: ".start",
			duration: 4000,
			speed: 800
		});
	});
</script>

<? 
include ("include/footer.php");
?>