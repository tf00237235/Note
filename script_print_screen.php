/*
	說明：用於列印畫面
	table 給予	border="1" 增加列印時框線
*/
<script>
	function printScreen(){
		var value = $('#print').html();
		var printPage = window.open("","printPage","");
		printPage.document.open();
		printPage.document.write("<HTML><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' ></head><BODY onload='window.print();window.close()'>");
		printPage.document.write("<PRE>");
		printPage.document.write(value);
		printPage.document.write("</PRE>");
		printPage.document.close("</BODY></HTML>");
	}
</script>

<input type="button" name="button" id="button" value="列印報表" onclick="printScreen()"/>
<div id="print">

</div>