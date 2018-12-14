<div class="copyright-main"><!-- copyright-main start-->
<div class="copyright"><!-- copyright start-->

<!--<p> <a href="http://www.rcart99.com/" class="logo"> Powered By </a> </p>-->
<p class="left">
<a href="index.php" class="hover-c"> <span> Home </span> </a> | <a href="about-us.php"> About Us </a> | <a href="our-admin.php"> Our Admin </a> | <a href="products.php"> Products </a> | <a href="our-strength.php"> Our Strength </a> | <a href="gallery.php"> Gallery </a> | <a href="our-infrastructure.php"> Our Infrastructure </a> | <a href="contact-us.php"> Contact us</a><br />
Copyright &copy; 2012 <a href="">DYNAMIC TOOLS PVT. LTD.</a>. All rights reserved.</p>
<p class="right-box">
<strong>Subscribe Our Newsletter :</strong><br />




<script>
function validate_form()
{
	var x=document.forms["frmFinal"]["email"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		  {
		  alert("Plese Enter valid e-mail address");
			document.forms["frmFinal"]["email"].focus();
		  return false;
		  }
}


</script>
<form action="sub.php" method="post" onSubmit="return validate_form();" name="frmFinal" ><input name="email" type="text" placeholder="Your E-mail Address" /><input type="submit" value="Subscribe " /></form>
</p>


<div class="clear"></div>
<!-- copyright end--></div>

<div class="clear"></div>
<!-- copyright-main End--></div>



</div>
<p class="center">
<span class="icon"><img src="images/fb-icon.png"></span>
<span class="icon"><img src="images/in-icon.png"></span>
<span class="icon"><img src="images/tw-icon.png"></span>
<span class="icon"><img src="images/rss-icon.png"></span></p>
</body>
</html>