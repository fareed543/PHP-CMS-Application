<div class="client-numer">
<h3>Testimonials</h3>
<?php
$q = mysql_query("select * from wn_tst order by tst_id desc") or die ("error in testimonial");
while($r = mysql_fetch_assoc($q)){
?>
	<div id="article">
	<blockquote>
			<p><?php echo $r['tst_desc']; ?></p>
			<cite><?php echo $r['tst_name']; ?></cite>
		</blockquote>
	
		<!-- <blockquote>
			<p>Hello Simon, <br />

My cousin Natalie has told me that you have helped her conceive as well ... She is very happy and I am happy too! See you are the "Miracle Man" I keep calling you ....I have sent MANY other people to you as well. </p>
			
		</blockquote>
	
    <blockquote>
			<p>Hi Simon and Grace,<br />

All is well with me. I have put some pictures here for you to see. Let me know when Simon returns from his holiday and we will bring our son to meet you.</p>
			<cite>I'll see you soon ...</cite>
		</blockquote> -->
    
		
	</div>
	<?php
}
	?>
    </div>
