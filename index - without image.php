<? 
include ("include/header.php");

if (isset($_REQUEST["uid"]) && $_REQUEST["uid"]!=0)
{
	$sqlstr = "select * from wn_cms where cms_id=".$_REQUEST["uid"];
	$myResult = mysql_query($sqlstr);
	if($rs = mysql_fetch_array($myResult))
	{
		//$ename		= $rs["e_name"];
		$img_desc  =stripslashes($rs["img_desc"]);
		$cms_name  =stripslashes($rs["cms_name"]);
		$sub_title  =stripslashes($rs["sub_title"]);
		$meta_title  =stripslashes($rs["meta_title"]);
		$meta_description  =stripslashes($rs["meta_description"]);
		$meta_keywords  =stripslashes($rs["meta_keyword"]);
		$disc  =stripslashes($rs["img_desc"]);
		$latestnews  =stripslashes($rs["latestnews"]);
		$description  =stripslashes($rs["description"]);
		$mobileno=stripslashes($rs["mobileno"]);
		//$im_top = stripslashes($rs["im_top"]);
		$img = stripslashes($rs["cms_img"]);
		// $adv_image2 =stripslashes($rs["adv_image2"]);
			//echo "surendra.........".$im_top;
	}
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
        <li class="inner-title-h3"><? echo $sub_title; ?></li>
        </ul>
<ol class="bjqs-markers h-centered"><li class="home-icon"><a href="index.html">Home</a> >> <? echo $sub_title; ?> </li>
<li>   </li></ol>

      </div>
      <!-- End outer wrapper -->
 <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/bjqs-1.3.min.js"></script>
      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      :55,
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
<strong>Latest News:</strong> <span><?php echo $latestnews; ?>..<span class="read-bg"><a href="#">Read More ></a></span></span></div>
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

<div class="conte">

<div class="bullet-points-color-box">
<div class="out-img">
<img src="images/our-company.png" border="0" />  </div>
<div class="contact-box-out">
<?php echo $disc; ?>

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


<? 
include ("include/footer.php");
?>