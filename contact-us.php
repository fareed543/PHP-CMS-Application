<? 
include ("include/header.php");

	$sqlstr = "select * from wn_cms where cms_name = 'Contact us'";
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
?>
<!-- main-menu End--></div>

<div id="main-max-banner"><!--start main-max-banner-->

<!--max banner js code start-->

<!--max banner js code end-->


<div class="max-banner">

<div id="container">

 <div id="banner-fade">


        <ul class="bjqs">
        <li class="inner-title-h3">Contact Us</li>
        
        </ul>
<ol class="bjqs-markers h-centered"><li class="home-icon"><a href="index.php">Home</a> >> Contact Us</li>
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

<div id="column-right"><!--column-right start-->
<?
    include ("admin/includes/connection.php");
	$sqlstr = "select * from wn_contacts order by id DESC ";
	$myResult = mysql_query($sqlstr);
	if($all = mysql_fetch_array($myResult))
	/*   	address  */
?>
<div class="box">
<h3>Address </h3>
<div class="contact-box-w">
<p>
<?=$all["address"]?></p>



<p class="mobil-icon"><?=$all["rec_numbers"]?> </p>
<p class="emain-icon"><?=$all["rec_emails"]?> </p>

</div>

</div>
<!--column-right End--></div>



<div id="content"><!--content start-->

<div class="box">
<div class="contact-box">

<div class="conte">
<h3> Contact Us</h3>

                         <form id="form" method="post" >
									 <iframe src="contactform.php" frameborder='0'
width='100%' height='350px' ></iframe>
</form>

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