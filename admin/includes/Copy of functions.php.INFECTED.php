<?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ?><?

function fnOrderEmail() 
{
	$strLangName="";
	$reLangName=mysql_query("select user_id,username from  wn_users");
	while($strCountry=mysql_fetch_array($reLangName))
	{
			$strCountry1=$strCountry1."<option value=".$strCountry['user_id'].">".$strCountry['username']."</option>";
	}
	return $strCountry1;
}


function fnCoupon() 
{
	$strLangName="";
	$reLangName=mysql_query("select d_id,c_num from  wn_discount");
	while($strCountry=mysql_fetch_array($reLangName))
	{
			$strCountry11=$strCountry11."<option value=".$strCountry['c_num'].">".$strCountry['c_num']."</option>";
	}
	return $strCountry11;
}


function fnTopupCats($pid)
{

	$strCountry="";
	$reCountry = mysql_query("select cat_title,cat_id,parent_id from wn_categories where parent_id=2");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
	echo "con =".$rsCountry["cat_id"]."<br>";
        if($rsCountry["cat_id"]==$pid){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['cat_id']." selected>".$rsCountry['cat_title']."</option>";
	}
	else
			$strCountry=$strCountry."<option value=".$rsCountry['cat_id'].">".$rsCountry['cat_title']."</option>";
	}
	return $strCountry;
}

function fnCallCardsCats($pid)
{

	$strCountry="";
	$reCountry = mysql_query("select cat_title,cat_id,parent_id from wn_categories where cat_id!=0");
	while($rsCountry=mysql_fetch_array($reCountry)){
	echo "con =".$rsCountry["cat_id"]."<br>";
        if($rsCountry["cat_id"]==$pid){
		$strCountry=$strCountry."<option value=".$rsCountry['cat_id']." selected>".$rsCountry['cat_title']."</option>";
	}
	else
			$strCountry=$strCountry."<option value=".$rsCountry['cat_id'].">".$rsCountry['cat_title']."</option>";
	}
	echo $strCountry;
	return $strCountry;
}


function fneventCats($pid)
{

	$strCountry1="";
	$reCountry1 = mysql_query("select * from wn_events where e_id!=0");
	//echo $reCountry;

	while($rsCountry1=mysql_fetch_array($reCountry1)){
	echo "con =".$rsCountry1["e_id"]."<br>";
        if($rsCountry1["e_id"]==$pid1){
		$strCountry1=$strCountry1."<option value=".$rsCountry1['e_id']." selected>".$rsCountry1['e_name']."</option>";
	}
	else
			$strCountry1=$strCountry1."<option value=".$rsCountry1['e_id'].">".$rsCountry1['e_name']."</option>";
	}
	echo $strCountry1;
	exit;
	return $strCountry1;
//echo $strCountry;
}

function fnCountryMulti($items)
{
	$strRelatedItems="";
	$ritems=explode(",",$items);
	$reRelatedItems = mysql_query("select country_id, country_name from wn_countries  order by country_name ");
        if($items !='') {
            while($rsRelatedItems=mysql_fetch_array($reRelatedItems)){
            if(in_array($rsRelatedItems["country_id"],$ritems)){
                        $strRelatedItems=$strRelatedItems."<option value=".$rsRelatedItems['country_id']." selected>".$rsRelatedItems['country_name']."</option>";
                }else{
                            $strRelatedItems=$strRelatedItems."<option value=".$rsRelatedItems['country_id'].">".$rsRelatedItems['country_name']."</option>";
                }
            }
        } else {
            
            while($rsRelatedItems=mysql_fetch_array($reRelatedItems)){
           
                            $strRelatedItems=$strRelatedItems."<option value=".$rsRelatedItems['country_id'].">".$rsRelatedItems['country_name']."</option>";
                
            }
        }
       
	return $strRelatedItems;
}


function fnCountryMulti1($items)
{
	$strRelatedItems="";
	$ritems=explode(",",$items);
	$reRelatedItems = mysql_query("select vill_id, vill_name from wn_vill  order by vill_name ");
        if($items !='') {
            while($rsRelatedItems=mysql_fetch_array($reRelatedItems)){
            if(in_array($rsRelatedItems["vill_id"],$ritems)){
                        $strRelatedItems=$strRelatedItems."<option value=".$rsRelatedItems['vill_id']." selected>".$rsRelatedItems['vill_name']."</option>";
                }else{
                            $strRelatedItems=$strRelatedItems."<option value=".$rsRelatedItems['vill_id'].">".$rsRelatedItems['vill_name']."</option>";
                }
            }
        } else {
            
            while($rsRelatedItems=mysql_fetch_array($reRelatedItems)){
           
                            $strRelatedItems=$strRelatedItems."<option value=".$rsRelatedItems['vill_id'].">".$rsRelatedItems['vill_name']."</option>";
                
            }
        }
       
	return $strRelatedItems;
}


function getmaincat($pid)
{
	$strCountry="";
	$reCountry = mysql_query("select cat_title,cat_id,parent_id from wn_categories where parent_id=0");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
        if($rsCountry["cat_id"]==$pid){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['cat_id']." selected>".$rsCountry['cat_title']."</option>";
	}
	else
			$strCountry=$strCountry."<option value=".$rsCountry['cat_id'].">".$rsCountry['cat_title']."</option>";
	}
	return $strCountry;
}
function getparentcat($id)
{
	$strCountry="";
	$reCountry = mysql_query("select cat_title from wn_categories where cat_id=".$id);
	if($rsCountry=mysql_fetch_array($reCountry))
	{ 
    	$strCountry=$rsCountry['cat_title'];
	}
	return $strCountry;
}
function getCountry($id)
{
	$strCountry="";
	$strCountry.="<option value=''>Select</option>";
	$selected="";
	$reCountry = mysql_query("select country_name,country_id from dm_countries order by country_name asc");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
        if($rsCountry["country_id"]==$id){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['country_id']." selected>".$rsCountry['country_name']."</option>";
	}
	else
			$strCountry=$strCountry."<option value=".$rsCountry['country_id'].">".$rsCountry['country_name']."</option>";
	}
	return $strCountry;
}
function getZoneCountry($id)
{
	$strCountry="";
	$strCountry.="<option value=''>Select</option>";
	$selected="";
	$reCountry = mysql_query("select region_id,country_name from dm_regions_countries where lang_prefix='$id' order by country_name asc");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
        $strCountry=$strCountry."<option value='".$rsCountry['region_id']."|".$rsCountry['country_name']."'>".$rsCountry['country_name']."</option>";
	}
	return $strCountry;
}
function getZones($id,$la)
{
	$strCountry="";
	$strCountry.="<option value=''>Select</option>";
	$selected="";
	$reCountry = mysql_query("select region_name,region_id from dm_regions  where lang_prefix='$la' order by region_name asc");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
        if($rsCountry["region_id"]==$id){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['region_id']." selected>".$rsCountry['region_name']."</option>";
	}
	else
			$strCountry=$strCountry."<option value=".$rsCountry['region_id'].">".$rsCountry['region_name']."</option>";
	}
	return $strCountry;
}
function fnDistributors($id)
{
	$strCountry="";
	$reCountry = mysql_query("select firstname,lastname,cust_id from dm_customers");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
        if($rsCountry["cust_id"]==$id){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['cust_id']." selected>".$rsCountry['firstname']." ".$rsCountry['lastname']."</option>";
	}
	else
			$strCountry=$strCountry."<option value=".$rsCountry['cust_id'].">".$rsCountry['firstname']." ".$rsCountry['lastname']."</option>";
	}
	return $strCountry;
}
function getShipTypes($id,$la)
{
	$strCountry="";
	$reCountry = mysql_query("select ship_id,ship_name from dm_shipping_types where lang_prefix='$la'");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
        if($rsCountry["ship_id"]==$id){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['ship_id']." selected>".$rsCountry['ship_name']."</option>";
	}
	else
			$strCountry=$strCountry."<option value=".$rsCountry['ship_id'].">".$rsCountry['ship_name']."</option>";
	}
	return $strCountry;
}
function getStates($id)
{
	$strCountry="";
	$reCountry = mysql_query("select statename,state_id from dm_states");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
    if($rsCountry["state_id"]==$id){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['state_id']." selected>".$rsCountry['statename']."</option>";
	}	else
			$strCountry=$strCountry."<option value=".$rsCountry['state_id'].">".$rsCountry['statename']."</option>";
	}
	return $strCountry;
}
function fnGetMarketApplication($id,$la)
{
	$strCountry="";
	$reCountry = mysql_query("select maket_id,title from dm_market_applications where lang_prefix='$la' order by title");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
    if($rsCountry["maket_id"]==$id){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['maket_id']." selected>".$rsCountry['title']."</option>";
	}	else
			$strCountry=$strCountry."<option value=".$rsCountry['maket_id'].">".$rsCountry['title']."</option>";
	}
	return $strCountry;
}
function fnGetCategoryTypes($id,$la)
{
	$strCountry="";
	$reCountry = mysql_query("select categorytype_id,title from dm_categorytype where lang_prefix='$la' order by title");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
    if($rsCountry["categorytype_id"]==$id){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['categorytype_id']." selected>".$rsCountry['title']."</option>";
	}	else
			$strCountry=$strCountry."<option value=".$rsCountry['categorytype_id'].">".$rsCountry['title']."</option>";
	}
	return $strCountry;
}
function getCountryName($id)
{
	$strCountryName="";
	$reCountryName=mysql_query("select * from dm_countries where country_id=".$id);
	echo "select * from dm_countries where country_id=".$id."<br>";
	$rsCountryName=mysql_fetch_array($reCountryName);
	$strCountryName=$rsCountryName["country_name"];
	return $strCountryName;
}
function geteventName($id)
{

	$strCountry="";
	$reCountry = mysql_query("select e_name,e_id from wn_events where e_id!=0");
	while($rsCountry=mysql_fetch_array($reCountry)){
	echo "con =".$rsCountry["e_id"]."<br>";
        if($rsCountry["e_id"]==$id){
		$strCountry=$strCountry."<option value=".$rsCountry['e_id']." selected>".$rsCountry['e_name']."</option>";
	}
	else
			$strCountry=$strCountry."<option value=".$rsCountry['e_id'].">".$rsCountry['e_name']."</option>";
	}
	//echo $strCountry;
	return $strCountry;
	//$strCatName="";
	//$reCatName=mysql_query("select * from wn_events where e_id=".$id);
	//$rsCatName=mysql_fetch_array($reCatName);
	//$strCatName=$rsCatName["cat_name"];
	//return $strCatName;
}
function getMainCats2($mcatid,$lang)
{
	$strMainCats="";
	$reMainCats = mysql_query("select * from dm_categories where parent_id=0 and lang_prefiex='$lang'");
	while($rsMainCats=mysql_fetch_array($reMainCats)){ 
		if($rsMainCats["cat_id"]==$mcatid) 	
			$strMainCats=$strMainCats."<option value='".$rsMainCats['cat_id']."' selected>".$rsMainCats['cat_name']."</option>";
			else
			$strMainCats=$strMainCats."<option value='".$rsMainCats['cat_id']."'>".$rsMainCats['cat_name']."</option>";
	}
	return $strMainCats;
}
function fnGetcatname($id,$lang){
	$sqlstr=mysql_query("select * from dm_categories where parent_id != 0  order by cat_name asc");
	$sqlSelCategories=" select * from dm_cats_products where prod_id='".$id."' and lang_prefiex='".$lang."'";
	//echo $sqlSelCategories."<br>";
		$exeSelCategories=mysql_query($sqlSelCategories);
		$count1=0;
		$is_select="";
		$count1= mysql_num_rows($exeSelCategories);
		if($count1>0){	
			$t=0;
			while($rs1= mysql_fetch_array($exeSelCategories)) {
			$selarr[$t] =$rs1["cat_id"];
			//echo "test 1=".$selarr[$t]."<br>";
			$t++;
			}
			asort($selarr);
		}
	
	while($rs=mysql_fetch_array($sqlstr)){
		$spa="";
		//if(getcats1($rs["cat_id"])==3) {
			$strArrayCats[getcats22($rs["cat_id"],$spa,$lang)]=substr(getMaincats($rs["cat_id"],$spa,$lang),3);
		//}
	
	}
	asort($strArrayCats);
	if(sizeof($selarr)>0) {
		$j=0;
		foreach($strArrayCats as $k=>$v) {
			$is_selected="";
			for($i=$j;$i<sizeof($selarr);$i++) {
				if($k==$selarr[$i]) {
					$is_selected="selected";
					//$j++;
				}
			}
					
			$strSearch_cats=$strSearch_cats."<option value='".$k."' ".$is_selected.">".$v."</option>";
		}
	} else {
		foreach($strArrayCats as $k=>$v) {
			$strSearch_cats=$strSearch_cats."<option value='".$k."'>".$v."</option>";
		}
	}


return $strSearch_cats;
}
function getRelatedItems($items,$la)
{
	$strRelatedItems="";
	$ritems=explode(",",$items);
	$reRelatedItems = mysql_query("select prod_id, prod_name from dm_products  where lang_prefiex='$la' order by prod_name ");
	while($rsRelatedItems=mysql_fetch_array($reRelatedItems)){ 
        if(in_array($rsRelatedItems["prod_id"],$ritems)){ 	
		    $strRelatedItems=$strRelatedItems."<option value=".$rsRelatedItems['prod_id']." selected>".$rsRelatedItems['prod_name']."</option>";
	    }else{
			$strRelatedItems=$strRelatedItems."<option value=".$rsRelatedItems['prod_id'].">".$rsRelatedItems['prod_name']."</option>";
	    }
	}
	return $strRelatedItems;
}
function getcats1($id,$lang)  {
		    
		$sqlstr4=mysql_query("select * from dm_categories where cat_id=".$id." and lang_prefiex='$lang'");
        $rssubCat=mysql_fetch_array($sqlstr4);
		if ($rssubCat["parent_id"]==0) {
			$str=1+$str;
	
        }
		else {
			//$str="(&nbsp;".$rssubCat["cat_name"]."&nbsp;)"; 
			 //$str="->".$rssubCat["cat_name"]; 
			 $str=1+getcats1($rssubCat["parent_id"]);
		}
		return $str;
        }

function getMaincats($id,$spa,$lang){
	$spa=$spa & "&nbsp;&nbsp;&nbsp;";  
	
	$sqlstr4=mysql_query("select * from dm_categories where cat_id=".$id." and lang_prefiex='$lang'");
	$rssubCat=mysql_fetch_array($sqlstr4);	
	if ($rssubCat["parent_id"] == ""){		
		$str=$str;
		
	}else{		
        
		 $str=" ->".$rssubCat["cat_name"]; 
		 
		$str=getMaincats($rssubCat["parent_id"],$spa,$lang).$str;
	
	}
	
	return $str;
}	

function getcats22($id,$spa,$lang){
	$spa=$spa & "&nbsp;&nbsp;&nbsp;";    
	$sqlstr4=mysql_query("select * from dm_categories where cat_id=".$id." and lang_prefiex='$lang'");
	$rssubCat=mysql_fetch_array($sqlstr4);	
	if ($rssubCat["parent_id"] == ""){		
		$str=$str;
		
	}else{		
		 $str = $rssubCat["cat_id"];	 
		 
	}
	return $str;
}
function getSubCats2($mcatid,$lang)
{
	$strMainCats="";
	$reMainCats = mysql_query("select * from dm_categories where parent_id=0 and lang_prefiex='$lang'");
	while($rsMainCats=mysql_fetch_array($reMainCats)){ 
		if($rsMainCats["cat_id"]==$mcatid) 	
			$strMainCats=$strMainCats."<option value='".$rsMainCats['cat_id']."' selected>".$rsMainCats['cat_name']."</option>";
			else
			$strMainCats=$strMainCats."<option value='".$rsMainCats['cat_id']."'>".$rsMainCats['cat_name']."</option>";
	}
	return $strMainCats;
}
function getpage($mcatid)
{
	$strMainCats="";
	$reMainCats = mysql_query("select * from dm_pages order by page_name ");
	while($rsMainCats=mysql_fetch_array($reMainCats)){ 
		if($rsMainCats["page_id"]==$mcatid) 	
			$strMainCats=$strMainCats."<option value='".$rsMainCats['page_id']."' selected>".$rsMainCats['page_name']."</option>";
			else
			$strMainCats=$strMainCats."<option value='".$rsMainCats['page_id']."'>".$rsMainCats['page_name']."</option>";
	}
	return $strMainCats;
}
function getproduct($mcatid,$lang)
{
	$strMainCats="";
	$reMainCats = mysql_query("select * from dm_products where  lang_prefiex='$lang'");
	while($rsMainCats=mysql_fetch_array($reMainCats)){ 
		if($rsMainCats["prod_id"]==$mcatid) 	
			$strMainCats=$strMainCats."<option value='".$rsMainCats['prod_id']."' selected>".$rsMainCats['prod_name']."</option>";
			else
			$strMainCats=$strMainCats."<option value='".$rsMainCats['prod_id']."'>".$rsMainCats['prod_name']."</option>";
	}
	return $strMainCats;
}
function getproduct1($mcatid,$lang)
{
	$strMainCats="";
	$reMainCats = mysql_query("select * from dm_products where  lang_prefiex='$lang'");
	while($rsMainCats=mysql_fetch_array($reMainCats)){ 
		if($rsMainCats["prod_id"]==$mcatid) 	
			$strMainCats=$strMainCats."<option value='".$rsMainCats['prod_id']."' selected>".$rsMainCats['prod_name']."</option>";
			else
			$strMainCats=$strMainCats."<option value='".$rsMainCats['prod_id']."'>".$rsMainCats['prod_name']."</option>";
	}
	return $strMainCats;
}
function getpro($mcatid,$lang)
{
	//echo $lang;
	$strMainCats="";
	$reMainCats = mysql_query("select * from dm_products where lang_prefiex='$lang'");
	while($rsMainCats=mysql_fetch_array($reMainCats)){ 
		if($rsMainCats["prod_id"]==$mcatid) 	
			$raj=$rsMainCats['prod_name'];
			}
	return $raj; 
}
function getcmspage($mcatid,$lang)
{
	$strMainCats="";
	$reMainCats = mysql_query("select page_id,page_name from dm_cms where  lang_prefix='$lang'");
	while($rsMainCats=mysql_fetch_array($reMainCats)){ 
		if($rsMainCats["page_id"]==$mcatid) 	
			$strMainCats=$strMainCats."<option value='".$rsMainCats['page_id']."' selected>".$rsMainCats['page_name']."</option>";
			else
			$strMainCats=$strMainCats."<option value='".$rsMainCats['page_id']."'>".$rsMainCats['page_name']."</option>";
	}
	return $strMainCats;
}

function getmcategories($mcatid)
{
	$strMainCats="";
	$reMainCats = mysql_query("select maket_id,title from dm_market_applications where lang_prefix='en' order by title");
	while($rsMainCats=mysql_fetch_array($reMainCats)){ 
		if($rsMainCats["maket_id"]==$mcatid) 	
			$strMainCats=$strMainCats."<option value='".$rsMainCats['maket_id']."' selected>".$rsMainCats['title']."</option>";
			else
			$strMainCats=$strMainCats."<option value='".$rsMainCats['maket_id']."'>".$rsMainCats['title']."</option>";
	}
	return $strMainCats;
}

function getCountrybillinglang($id,$lang)
{
	$strCountry="";
	$reCountry = mysql_query("select country_name,country_id from dm_countries where lang_prefix like '$lang'");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
        if($rsCountry["country_id"]==$id){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['country_id']." selected>".$rsCountry['country_name']."</option>";
	}
	else
			$strCountry=$strCountry."<option value=".$rsCountry['country_id'].">".$rsCountry['country_name']."</option>";
	}
	return $strCountry;
}

function fnGetMaterial($id,$la)
{
	$strCountry="";
	$reCountry = mysql_query("select mat_name,mat_id from dm_material where lang_prefix='$la' order by mat_name asc");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
    if($rsCountry["mat_id"]==$id){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['mat_id']." selected>".$rsCountry['mat_name']."</option>";
	}	else
			$strCountry=$strCountry."<option value=".$rsCountry['mat_id'].">".$rsCountry['mat_name']."</option>";
	}
	return $strCountry;
}
function fnGetChemical($id,$la)
{
	$strCountry="";
	$reCountry = mysql_query("select chem_name,chem_id from dm_chemical where lang_prefix='$la' order by chem_name asc");
	while($rsCountry=mysql_fetch_array($reCountry)){ 
    if($rsCountry["chem_id"]==$id){ 	
		$strCountry=$strCountry."<option value=".$rsCountry['chem_id']." selected>".$rsCountry['chem_name']."</option>";
	}	else
			$strCountry=$strCountry."<option value=".$rsCountry['chem_id'].">".$rsCountry['chem_name']."</option>";
	}
	return $strCountry;
}



?>