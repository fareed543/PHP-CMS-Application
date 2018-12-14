<?php /**/ ?><?session_start();

if($_SESSION["gblAdminId"]=="") header("location: index.php");
include("includes/connection.php");
include("includes/functions.php");



		$pg	   =  $_REQUEST["pg"];
		$cat_id     =  $_REQUEST["cat_id"];	
        $e_id     =  $_REQUEST["e_id"];
		$prod_name  =  $_REQUEST["prod_name"];
		$price	    =  $_REQUEST["price"];
		$qty 	    = $_REQUEST["qty"];
		$desc       = $_REQUEST["desc"];
		$uk_access  = $_REQUEST["uk_access"];
		$uk_custservice = $_REQUEST["uk_custservice"];
     //echo  $e_id ;
     //echo $cat_id;
   //  exit;
     

               // $national_calls  = $_REQUEST["national_calls"];
               // $local_calls     = $_REQUEST["local_calls"];
              // $free_calls      = $_REQUEST["free_calls"];

		$new_stock      = $_REQUEST["new_stock"];
        //echo $new_stock;
        //exit;
                //$discount       = $_REQUEST["discount"];
				

	
$path="../uploads/";
 		
if($_REQUEST["tType"]=="Add")
{   

	
  
			
				
		if (is_uploaded_file($_FILES['prod_image']['tmp_name'])){
					
				$imgfull    = $_FILES['prod_image']['name'];
				$imgpos     = strrpos($imgfull, ".");
				$imgname1   = substr($imgfull,0,$imgpos);
				$imgext     = substr($imgfull,$imgpos);
				$imgname    = $imgname1.rand (0,9999);
				$image3      = $imgname.$imgext;
				
				copy($_FILES['prod_image']['tmp_name'], $path.$image3);

				
			} else{
				$image3 = $_REQUEST["previmg"];
				
			}
	  

                    if($_REQUEST[country]!=""){
                        $selcountry = join(",",$_REQUEST[country]);
                    }
                    
                      if($_REQUEST[village]!=""){
                        $selcountry1 = join(",",$_REQUEST[village]);
                    }
			 
	
		$insert_p_color_quaey="insert into wn_products (cat_id,subcat_id,prod_title,prod_image,prod_desc,prod_cuntry,p_event,uk_access,quantity,price,uk_custservice,national_calls,local_calls,free_calls,new_stock,discount) values ('1', '".$cat_id."', '".addslashes($prod_name)."',  '".addslashes($image3)."', '".addslashes($desc)."','".$selcountry."', '".$e_id."' ,'".addslashes($uk_access)."', '".addslashes($qty)."', '".addslashes($price)."','".addslashes($uk_custservice)."','".addslashes($national_calls)."','".addslashes($local_calls)."','".addslashes($free_calls)."','".addslashes($new_stock)."', '".addslashes($discount)."')";
		//echo 	$insert_p_color_quaey;
		//exit;
		
		$pcolor_id=mysql_query($insert_p_color_quaey);   
		
		$einstId=mysql_insert_id();

		        
			
     if($_REQUEST['app']==1)
	{
		header("location: editccprod.php?va=2&tType=Edit&pg=$pg&uid=$einstId");
		exit;
	}
	else
	{
		header("location: viewccprod.php?va=1&pg=$pg");
		exit;
	}
}
else if($_REQUEST["tType"]=="Edit") {
		

				if (is_uploaded_file($_FILES['prod_image']['tmp_name'])){
					
				$imgfull    = $_FILES['prod_image']['name'];
				$imgpos     = strrpos($imgfull, ".");
				$imgname1   = substr($imgfull,0,$imgpos);
				$imgext     = substr($imgfull,$imgpos);
				$imgname    = $imgname1.rand (0,9999);
				$image3      = $imgname.$imgext;
                
                if(file_exists($path.$_REQUEST["previmg"]))
			    @unlink($path.$_REQUEST["previmg"]);
				
				copy($_FILES['prod_image']['tmp_name'], $path.$image3);

				
			} else {
				$image3 = $_REQUEST["previmg"];
				
			}
	if(file_exists($path.$_REQUEST["previmg"]))
                                     @unlink($path.$_REQUEST["previmg"]);

                         if($_REQUEST[country]!=""){
                             $selcountry = join(",",$_REQUEST[country]);
                        }
            
	$update_event_quaey="update wn_products set subcat_id='".$cat_id."', prod_title='".addslashes($prod_name)."', prod_image='".$image3."',prod_cuntry='".$selcountry."', prod_desc='".addslashes($desc)."', quantity='".addslashes($_REQUEST[qty])."', price='".addslashes($_REQUEST[price])."', P_event='".addslashes($_REQUEST[e_id])."' , new_stock ='".addslashes($new_stock)."'  where prod_id= ".$_REQUEST["uid"];
			
			//echo "update_event_quaey =".$update_event_quaey."<br>";
			//exit;
				$pcolor_id=mysql_query($update_event_quaey);

			
	if($_REQUEST['app']==1)
	{
		header("location: editccprod.php?tType=Edit&pg=$pg&uid=$_REQUEST[uid]");
		exit;
	}
	else
	{
		header("location: viewccprod.php?va=2&pg=$pg");
		exit;
	}
}
else if($_REQUEST["tType"]=="Del")
{
		$messageid=$_REQUEST["chkdelids"];
		$messageid=explode(",",$messageid);
		$count=count($messageid);
		$path="../uploads/";

		for($i=0;$i<$count;$i++)
		{
			// before deleting the image delete the images and video and audio files.
$query = "select prod_image from wn_products where prod_id=".$messageid[$i];
			//echo $query;
			//exit;
			$result=mysql_query($query);
			$rs= mysql_fetch_array($result);
			//echo '-----'.$rs['img'].'-----';
			//echo $sqlstr;
			//echo $query;
			//exit;
			
			if(file_exists($path.$rs['prod_image']))
                                    @unlink($path.$rs['prod_image']);
			$sql_select =" select prod_image from wn_products where prod_id=".$messageid[$i];
			$exe_select = mysql_query($sql_select);

			

			if($rs_select = mysql_fetch_array($exe_select)) {

				

				if($rs_select['prod_image'] !='') { // remove first image.
					
					$imgfull = $rs_select['event_image_front'];
					
					
					if(file_exists($path.$imgfull)) 
						@unlink($path.$imgfull);

					
				}

				

						
			}
			
			$sqlstr = "delete from wn_products where prod_id=".$messageid[$i];

			mysql_query($sqlstr);
		}
	header("location:  viewccprod.php?va=3&pg=$pg");
	exit;
} else if($_REQUEST["tType"]=="Act"){

	$update_mem_status ="update wn_products set event_status ='".$_REQUEST["status"]."' where prod_id='".$_REQUEST["uid"]."'";
	mysql_query($update_mem_status);
	header("location: viewccprod.php?va=4");
	exit;
	}

?>