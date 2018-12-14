<Script Language=Javascript>
/***********************************************************************
Function Name	:fnCheckSpaces()
Purpose			:Function to check the spaces in Starting position
Input			:Entered value
Output			:Remove Spaces
***********************************************************************/
function fnCheckSpaces(txtObj)
{
	/*Local Variables intLen
		intLen -- To store the Length of the string
	*/

	var intLen
	intLen=txtObj.value.length
	// remove spaces bfore string
	for(var i=0;i<=intLen;i++)
	{
		if(txtObj.value.charAt(0)==" ")
		{
			txtObj.value=txtObj.value.replace(" ","")
		}
		else {
			break
		}
	}
	return txtObj
}
</script>