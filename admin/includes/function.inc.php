<?php /**/ ?><?

//====================================================================

function imagecpy($srcfile,$srcimage,$destimage)
{
  if($srcfile=="image/" || $srcfile=="image/jpeg")
	 {
          if(filesize($srcimage)<5242880)
	       {
           move_uploaded_file($srcimage,$destimage) or die ("Could not copy");
           return($destimage);                           
           }
         else if(filesize($srcimage)>5242880)
	          {
              return(-1);
	         }
      }
}
//=====================================================================
//====================================================================

function imagecpy_server($srcimage,$destimage)
{
	if(filesize($srcimage)<5242880)
	{
     	copy($srcimage,$destimage) or die ("Could not copy");
        return($destimage);                           
   	}
    else if(filesize($srcimage)>5242880)
	{
    	return(-1);
    }
}
//=====================================================================
function resampimagejpg( $forcedwidth, $forcedheight, $sourcefile, $destfile )
{
    $fw = $forcedwidth;
    $fh = $forcedheight;
    $is = getimagesize( $sourcefile );
  if($is[0]<$fw && $is[1]<$fh)
   {
   //This is done if the source image is less than both the forced height & weight.
   if($sourcefile==$destfile)
   move_uploaded_file($sourcefile,$destfile);
   else
   copy($sourcefile,$destfile);
    
   } 
  else 
  {
    if( $is[0] >= $is[1] )
    {
        $orientation = 0;
    }
    else
    {
        $orientation = 1;
        $fw = $forcedheight;
        $fh = $forcedwidth;
    }
    if ( $is[0] > $fw || $is[1] > $fh )
    {
        if( ( $is[0] - $fw ) >= ( $is[1] - $fh ) )
        {
            $iw = $fw;
            $ih = ( $fw / $is[0] ) * $is[1];
        }
        else
        {
            $ih = $fh;
            $iw = ( $ih / $is[1] ) * $is[0];
        }
        $t = 1;
    }
    else
    {
        $iw = $is[0];
        $ih = $is[1];
        $t = 2;
    }
    if ( $t == 1 )
    {
        $img_src = imagecreatefromjpeg( $sourcefile );
        $img_dst = imagecreatetruecolor( $iw, $ih );
        imagecopyresampled( $img_dst, $img_src, 0, 0, 0, 0, $iw, $ih, $is[0], $is[1] );
        if( !imagejpeg( $img_dst, $destfile, 90 ) )
        {
            exit( );
        }
    }
    else if ( $t == 2 )
    {
        copy( $sourcefile, $destfile );
    }
  }      
   return $destfile;
}
//===========calculate years of age (input string: YYYY-MM-DD)
function birthday ($birthday){
list($month,$day,$year) = explode("-",$birthday);
$year_diff = date("Y") - $year;
$month_diff = date("m") - $month;
$day_diff = date("d") - $day;

if($day_diff < 0)
$month_diff--;
if ($month_diff < 0)
$year_diff--;

return $year_diff;
}
//===========Zodiac Sign====================================
function getsign($date){
           list($month,$day,$year)=explode("-",$date);
           if(($month==1 && $day>20)||($month==2 && $day<20)){
                    return "Aquarius";
           }else if(($month==2 && $day>18 )||($month==3 && $day<21)){
                    return "Pisces";
           }else if(($month==3 && $day>20)||($month==4 && $day<21)){
                    return "Aries";
           }else if(($month==4 && $day>20)||($month==5 && $day<22)){
                    return "Taurus";
           }else if(($month==5 && $day>21)||($month==6 && $day<22)){
                    return "Gemini";
           }else if(($month==6 && $day>21)||($month==7 && $day<24)){
                    return "Cancer";
           }else if(($month==7 && $day>23)||($month==8 && $day<24)){
                    return "Leo";
           }else if(($month==8 && $day>23)||($month==9 && $day<24)){
                    return "Virgo";
           }else if(($month==9 && $day>23)||($month==10 && $day<24)){
                    return "Libra";
           }else if(($month==10 && $day>23)||($month==11 && $day<23)){
                    return "Scorpio";
           }else if(($month==11 && $day>22)||($month==12 && $day<23)){
                    return "Sagittarius";
           }else if(($month==12 && $day>22)||($month==1 && $day<21)){
                    return "Capricorn";
           }
}
?>