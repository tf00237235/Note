//變動版
<th width="17%" height="32" align="right">*檢查日期：</th>
<td width="85%" height="32">
	<select name="check_date_y" id="check_date_y">
		<option value='' <? if($frm['check_date_y']==""){echo "selected";} ?>>請選擇</option>
		<option value='2019' <? if($frm['check_date_y']==2019){echo "selected";} ?>>2019</option>
		<option value='2020' <? if($frm['check_date_y']==2020){echo "selected";} ?>>2020</option>
	</select>
	年
	<select name="check_date_m" id="check_date_m">
	</select>
	月
	<select name="check_date_d" id="check_date_d">
	</select>
	日
</td>
<script>
	$('#check_date_y').change(function() {
		//更動第一層時第二層清空
		$('#check_date_m').empty().append("<option value=''>請選擇</option>");
		$('#check_date_d').empty().append("<option value=''>請選擇</option>");
		if($('#check_date_y').val()==2019){
			var i;
			for(i=1;i<=12;i++){
				$('#check_date_m').append("<option value='" + i +"'>" + i + "</option>");
			}
			for(i=1;i<=31;i++){
				$('#check_date_d').append("<option value='" + i +"'>" + i + "</option>");
			}
		}else if($('#check_date_y').val()==2020){
			$('#check_date_m').append("<option value='1'>1</option>");
			for(i=1;i<=31;i++){
				$('#check_date_d').append("<option value='" + i +"'>" + i + "</option>");
			}
		}
	});
</script>
//預載入版
<script>
window.onload=function(){
	var i,k,j;
	//更動第一層時第二層清空
	$('#check_date_m').empty().append("<option value=''>請選擇</option>");
	$('#check_date_d').empty().append("<option value=''>請選擇</option>");
	k = <?=$frm['check_date_m']?>;
	j = <?=$frm['check_date_d']?>;
	if($('#check_date_y').val()==2019){
		//月
		for(i=1;i<=12;i++){
			if(k=i){
				$('#check_date_m').append("<option value='" + i +"' selected>" + i + "</option>");
			}else{
				$('#check_date_m').append("<option value='" + i +"'>" + i + "</option>");
			}
		}
		//日
		for(i=1;i<=31;i++){
			if(j=i){
				$('#check_date_d').append("<option value='" + i +"' selected>" + i + "</option>");
			}else{
				$('#check_date_d').append("<option value='" + i +"'>" + i + "</option>");
			}
		}
	}else if($('#check_date_y').val()==2020){
		//月
		if(k=i){
			$('#check_date_m').append("<option value='1' selected>1</option>");
		}else{
			$('#check_date_m').append("<option value='1'>1</option>");
		}
		//日
		for(i=1;i<=31;i++){
			if(j=i){
				$('#check_date_d').append("<option value='" + i +"' selected>" + i + "</option>");
			}else{
				$('#check_date_d').append("<option value='" + i +"'>" + i + "</option>");
			}
		}
	}
};
</script>