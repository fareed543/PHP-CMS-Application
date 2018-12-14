<? 
include ("include/header.php");

	$sqlstr = "select * from wn_latestinfo order by id DESC";
	$myResult = mysql_query($sqlstr);
	if($rs = mysql_fetch_array($myResult))
	{
		$disc  =stripslashes($rs["rec_discription "]);
		$img = stripslashes($rs["image"]);
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
        <li class="inner-title-h3">Latest News</li>
        </ul>
<ol class="bjqs-markers h-centered"><li class="home-icon"><a href="index.php">Home</a> >> Latest News </li>
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
<img src="products/<? echo $img ?>" border="0" width="240" height="175" />  </div>
<div class="contact-box-out">
<h2><?=$all["rec_news"]?></h2>
<p><?=$all["rec_discription"]?></p>

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