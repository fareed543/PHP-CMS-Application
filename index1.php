<?
include('include/header.php');
?>
<!-- main-menu End--></div>

<div id="main-max-banner"><!--start main-max-banner-->

<!--max banner js code start-->

<!--max banner js code end-->


<div class="max-banner">

<div id="container">

  <div id="banner-fade">

<?php
	$sqlstr = "select * from wn_product ";
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
    
        <ul class="bjqs">
          <li><a href="products.php" title=""><img src="products/<?php echo $img; ?>" border="0" title=""></a></li>
          <?
	}			  ?>
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

<div class="box">
<h3>Our Experts</h3>

<div class="slider-bg"> 

<div class="image-additional">
<div class="gallery gallery1">
	<div class="holder">
				<ul style="margin-left: 0px;">
                <li><a onclick="return hs.expand(this)" class="highslide" href="">
	<img title="" alt="" src="images/img-1.png"></a></li>
     <li><a onclick="return hs.expand(this)" class="highslide" href="">
	<img title="" alt="" src="images/img-1.png"></a></li>
     <li><a onclick="return hs.expand(this)" class="highslide" href="">
	<img title="" alt="" src="images/img-1.png"></a></li>
     <li><a onclick="return hs.expand(this)" class="highslide" href="">
	<img title="" alt="" src="images/img-2.png"></a></li>
		</ul>
	</div>		
				<div class="control">
				<a class="prev" href="#"></a>
				<a class="next" href="#"></a>            </div> 
</div></div>
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
                        <!--small_Img --></div>
                        <!--pro_detailImgs --></div>

<!--column-right End--></div>



<div id="content"><!--content start-->

<div class="box">
<div class="contact-box">
<div class="img-box"><img src="images/5271.png" /></div>
<div class="conte">
<h4>Welcome!</h4>
<p><strong>Dynamic Tools Pvt Ltd.</strong> is a leading Manufacturer and Exporter of Medium Range Cigarette Machinery and Critical Spare parts for high-speed Cigarette Machinery. Our machinery Equipment combines superior design with Customized service for various multinational and local customers. </p>


<p>Mr.G.R.Surya Raj, promoter of Dynamic Tools Pvt Ltd., a Technocrat, worked for HMT, Hyderabad
for over 15 years. During the period of working with HMT, he gained knowledge of highly sophisticated machine tool manufacturing machines on CNC, HMC and many state-of-the art machines </p>

</div>
</div>
</div>



<div class="clear"></div>  
<!--container End--></div>
               
</div>

<!--main-max-banner End--></div>
</div>

<?
include('include/footer.php')
?>