<?
	include_once("../../libraries/applet.php");
	include_once("../../libraries/shield.php");     // 資訊安全函式
	include("header.php");	//	檔頭
	
	
?>


<div id="backSelect" value="" style="display:none;">
	
		<input  class="radio-style" name="radio_test" value="0" type="radio">A
		<input  class="radio-style" name="radio_test" value="1" type="radio">B
		<input  class="radio-style" name="radio_test" value="2" type="radio">C
		<input  class="radio-style" name="radio_test" value="3" type="radio">D
		
</div>
   <script type="text/javascript">
		/*
       $().ready(function () {
			//radio點擊2次取消
           //請幫radioButton加入checkSelect='N' 的屬性，若是已被選取的加上checkSelect='Y'
           $('input[type=radio]').click(function () {
               if ($('#backSelect').attr('value') != $(this).attr('id')) {
                   $('#backSelect').attr('value', $(this).attr('id'));
                   $("input[type=radio][name=" + $(this).attr('name') + "]").each(function () {
                       $(this).attr('checkSelect', 'N');
                   });
               }

               if ($(this).attr('checkSelect') == 'Y') {
                   $(this).attr('checked', false);
                   $(this).attr('checkSelect', 'N');
               }
               else {
                   $(this).attr('checked', true);
                   $(this).attr('checkSelect', 'Y');
               }
           });
       });
	   */
</script>
<script> 
	function enhancedRadio() {
		//複數form 嘗試調整這邊，大概是有幾個複製幾組，一個form 對應一組控制器
		var r = document.forms[0].elements[this.name]; 
		//
		for (var i=0;i<r.length;i++) { 
			if (r[i].index != this.index) 
				r[i].isChecked = false; 
		} 
		this.isChecked = !this.isChecked; 
		this.checked = this.isChecked; 
	} 
	function deployRadioEvent() { 
		//複數form 嘗試調整這邊，大概是有幾個就複製幾組，一個form 對應一組控制器
		var f = document.forms[0]; 
		//
		for (var i=0;i<f.elements.length;i++) {
			var e = f.elements[i];
			if (e.type == "radio") {
				e.onclick = enhancedRadio; 
				e.setAttribute("isChecked",false); 
				e.setAttribute("index",i);
			}	 
		}	 
	} 
	deployRadioEvent(); 
</script>
