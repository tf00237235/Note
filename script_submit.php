/*
說明：btn按下後可以進行submit，用於btn 自帶樣式或submit 本身樣式不符或單form 多類型送出

*/
<script>
	function check_save_mode(form){
		var objchk = document.getElementById("check_save");
		if(objchk.checked == true ){
			form.mode.value = 'check_save';
			form.method = 'post';
			form.action = "<?=$web_users["me"];?>";
			form.submit();
		}
	}
</script>


<input type="button" value="年月顯示" onclick="date_check(form_search)">&nbsp;&nbsp;
<input type="button" onclick="all_check(form_search)" value="全部顯示" >&nbsp;&nbsp;