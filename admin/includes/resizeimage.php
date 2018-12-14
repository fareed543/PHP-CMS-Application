<?php /**/ ?><?
function create_thumb($filename,$width,$height,$sourcefolder,$distdir,$name_join)
{
	#-+ Directory where original images reside 
				
				$imgdir = $sourcefolder;
				$img = $filename;
			#-+ Directory where the thumbnails will be saved 
				//$tndir ="../uploads/brands/thumb/"; 
				$tndir =$distdir; 
				//chmod ($tndir,0777);
			#-+ Thumbnail width 
				$tn_w = $width; 
			
			#-+ Check if the file exists 	
				if (!file_exists($imgdir.$img))
				{ 
					die ("Error: File not found..."); 
				} 
			#-+ Check if the file extesion is .jpg 
				$ext = explode('.', $img); 
				$ext = $ext[count($ext)-1]; 

			#-+ Read the source image
			  if (strtolower($ext) == "jpg"){
				 $src_img = ImageCreateFromJPEG($imgdir.$img); 
			  }else if (strtolower($ext) == "gif"){
				 $src_img = imagecreatefromgif($imgdir.$img);
			  }else if (strtolower($ext) == "png"){
				 $src_img = imagecreatefrompng($imgdir.$img);
			  }else{
				  die ("Error: File must be JPEG or GIF or PNG"); 
			  }
				
			#-+ Get image width and height 
				$org_h = imagesy($src_img); 
				$org_w = imagesx($src_img); 
			
			//destination image naming
			$imgpos = strrpos($img, "_");
			//$imgname = substr($img,0,$imgpos);
			$imgname = substr($img,0,($imgpos));
			$end_part = substr($img,($imgpos+1));
			//echo $imgname;
			$thumb = $imgname."_".$name_join."_".$end_part;	
			//echo "img=".$img."<br>";
			//echo "ext=".$end_part."<br>";
			//echo "name_join_full=".$thumb."<br>";
			#-+ Calculate thumbnail height 
			//	$tn_h = floor($tn_w * $org_h / $org_w); 
			$tn_h =$height;
			#-+ Initialize destination image 
				//$dst_img = ImageCreate($tn_w,$tn_h); 
				$dst_img = imagecreatetruecolor($tn_w,$tn_h); 
				
			#-+ Do it! 
				//imagetruecolortopalette($src_img, false, 256); 
				//$palsize = ImageColorsTotal($src_img); 
				//for ($i = 0; $i<$palsize; $i++) 
				//{ 
				//   $colors = ImageColorsForIndex($src_img, $i); 
				//   ImageColorAllocate($dst_img, $colors['red'], $colors['green'], $colors['blue']); 
				//} 

				ImageCopyResized($dst_img, $src_img, 0, 0, 0, 0, $tn_w, $tn_h, $org_w, $org_h); 

			#-+ Save it! 
				ImageJPEG($dst_img, $tndir.$thumb); 			   				
				imagedestroy($dst_img);

//thumbnail end
}

?>