<?
function fnValidateString($x)
{
	$x=trim($x);
	$x=str_replace("''","''",$x);
	$x=stripslashes($x);
	return $x;
}
?>
