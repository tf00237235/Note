//說明：按指定位置，控制指定id style 進行更動
<script>
function show(lock_id) { 
    var change_style = document.getElementById(lock_id); 
	if(change_style.style.display=="none"){
		change_style.style.display = "";
	}else{
		change_style.style.display = "none";
	}
} 
</script>


<tr>
	<td>
		
	</td>
	<td>
		
	</td>
	
	<td>
		<img src="../images/bt-search.gif" height="19" width="41" onclick="show(<?=$rs_report->lock_id?>)">
	</td>
</tr>
<tr style="display:none" id="<?=$rs_report->lock_id?>">
	<td></td>
	<td></td>
	<td></td>
</tr>