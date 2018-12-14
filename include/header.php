<?php
include ("admin/includes/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="image/rcart-icon_favi.png">
<title>DYNAMIC TOOLS PVT. LTD.</title>
<script type="text/javascript" src="js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald">
</head>

<body>
<div class="main-wraper"> <!-- main-wraper start-->




<div class="main-header">
  <!-- main-header start-->
  <div id="container">
    <!-- container start-->

<div id="header"><!-- header start-->

      <div id="logo"> <a href="index.php"><img alt="KPIAS" src="images/dt-logo_logo.png"></a></div>
<?
    include ("admin/includes/connection.php");
	$sqlstr = "select * from wn_contacts order by id DESC ";
	$myResult = mysql_query($sqlstr);
	if($all = mysql_fetch_array($myResult))
	/*   	address  */
?>

 <div id="content-contact">
 <div class="box-c"><?=$all["rec_numbers"]?> 
          </div>
 </div>
 
  <div id="content-email">
<div class="box-e"><?=$all["rec_emails"]?>
          </div>
 </div>
 
      
  <!-- header End-->   </div>
  <!-- container End--> </div>
<!-- main-header End--></div>

<div id="main-menu"><!-- main-menu start-->

<div id="container"><!-- container start-->

<div id="menu">
<ul>
<li><a href="index.php" class="hover-c"><span>Home </span></a></li>
<li ><a href="about-us.php"><span>About Us</span> </a></li>
<li><a href="our-admin.php"><span>Our Admin </span></a></li>
<li><a href="products.php"><span>Products </span></a></li>
<li><a href="our-strength.php"><span> Our Strength</span>           </a></li>
<li ><a href="gallery.php"><span>Gallery</span></a></li>
<li ><a href="our-infrastructure.php"><span>Our Infrastructure</span></a></li>
<li ><a href="contact-us.php"><span>Contact us</span></a></li>
</ul>
</div>

<!-- container End--> </div>