function fnPopup(id1,imgWidth,imgHeight,from) {
        url1="imagepopup.php?aid="+id1+"&from="+from
			//alert(url1)
            var attributes="";
            var WinWidth = parseInt(imgWidth) + 50;
            var WinHeight = parseInt(imgHeight) +80;
            
            if ((WinWidth != 800) && (WinHeight != 572))
		        WinVars = 'toolbar=no,menubar=no,width='+escape(WinWidth)+',height='+escape(WinHeight)+',top=0,left=0';
	        else
		        WinVars = 'toolbar=no,menubar=no,scrollbars=yes,top=0,left=0';
        
        //alert(WinVars)
        window.open(url1,"Image",WinVars);
}