<script language=javascript>
function fnEmail(txtEmail)
{
	if (txtEmail.value!="")
	{
		var intLen=txtEmail.value.length
		var blnFlag=0
		if (txtEmail.value.charAt(0)=="@" || txtEmail.value.charAt(0)==".")
		{
			alert("Invalid E-Mail Address")
			txtEmail.focus()
			return false
		}
		if (txtEmail.value.charAt(intLen-1)=="@" || txtEmail.value.charAt(intLen-1)==".")
		{
			alert("Invalid E-Mail Address")
			txtEmail.focus()
			return false
		}
		for (var i=0;i<intLen;i++)
		{
			if (txtEmail.value.charAt(i)=="@")
			{
				blnFlag=blnFlag+1
			}
		}
		if (blnFlag>=0 && blnFlag<1 || blnFlag>1)
		{
			alert("Invalid E-Mail Address")
			txtEmail.focus()
			return false
		}
		strSplit=(txtEmail.value).split("@")
		intSptLen=strSplit[1].length
		var intCnt=0
		for(var j=0;j<intSptLen;j++)
		{
			if (strSplit[1].charAt(j)==".")
			{
				intCnt=intCnt+1
			}
		}
		if (intCnt<=0)
		{
			alert("Invalid E-Mail Address")
			txtEmail.focus()
			return false
		}
		return true
	}
}
</script>