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
        <li class="inner-title-h3">Gallery</li>
        
        </ul>
<ol class="bjqs-markers h-centered"><li class="home-icon"><a href="index.php">Home</a> >>Gallery </li>
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
<? 
	include('latest-info.php');
?>
<strong>Latest News:</strong> <span><?= substr($all["rec_news"],0,140) ?>......<span class="read-bg"><a href="latestnews.php"><B>Read More ></B></a></span></span></div><!--container end--></div>
<!--container end--></div>


<div class="main-content">
<div class="main-column"><!--main-max-banner start-->
<div id="container"><!--container start-->

<div id="content"><!--content start-->
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
       <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
<div class="box">
<div class="contact-box">

<div class="conte">
<div id="gallery">
    <ul>
<?php
	$sqlstr = "select * from wn_photo order by photo_id ASC ";
	$myResult = mysql_query($sqlstr);
	while($rs = mysql_fetch_array($myResult))
	{
		$img  =stripslashes($rs["image"]);
        ?>

    <li><a href="uploads/<?php echo $img; ?>" title=""><img src="uploads/<?php echo $img; ?>" width="200" height="120" alt="" /></a> </li>
       <? }?>
		 </ul>
</div>



        <ul class="bjqs">
          <li><a href="products.php" title=""><img src="products/<?php echo $img; ?>"   border="0" title=""></a></li>
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