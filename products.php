
<? 
include ("include/header.php");	
?>

<!-- main-menu End--></div>

<div id="main-max-banner"><!--start main-max-banner-->

<!--max banner js code start-->

<!--max banner js code end-->


<div class="max-banner">

<div id="container">

 <div id="banner-fade">


        <ul class="bjqs">
        <li class="inner-title-h3">Products</li>
        
        </ul>
<ol class="bjqs-markers h-centered"><li class="home-icon"><a href="index.php">Home</a> >> Products </li>
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
<strong>Latest News:</strong> <span><?= substr($all["rec_news"],0,140) ?>......<span class="read-bg"><a href="latestnews.php"><B>Read More ></B></a></span></span></div><!--container end--></div>
<div class="main-content">
<div class="main-column"><!--main-max-banner start-->
<div id="container"><!--container start-->

<div id="notification"></div>

<div id="content"><!--content start-->

<div class="box">
<div class="contact-box">

<div class="conte">


	<?php
include('pagination.php');	

		while($row = mysql_fetch_array($result))
		{
	?>
	<div class="bullet-points-color-box">
	<div class="out-img">
	<img src="products/<?php echo stripslashes($row["image"]); ?>" height=191 width="260" />  </div>
	<div class="contact-box-out-2">
	<h2><?php echo stripslashes($row["prod_name"]); ?></h2> 
	<h5><?php echo stripslashes($row["title"]); ?></h5>
	<p><?php echo stripslashes($row["prod_desc"]); ?></p>
	<ul class="our-inf-1">
	<?php
		$pid  =stripslashes($row["id"]);
		$sql = "select * from wn_prodfeature where prod_id = $pid order by id ASC ";
		$my = mysql_query($sql)or die(mysql_error());
		while($pro = mysql_fetch_array($my))
		{
			$prod_features  =stripslashes($pro["prod_features"]);   ?>
			<li><?php echo $prod_features;?></li>
			
		<? }   ?>
	</ul>
	</div>
	</div>
<br>
<?php
	
		}
		echo "</TABLE></center>";
	?>

<?=$pagination?>
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