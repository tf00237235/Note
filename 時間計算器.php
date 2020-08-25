/*
	說明：select 選擇時間長度，function 內調整每單位長度時間

*/
<script>
function forChange1(){
	var total=document.getElementById('date_start').value;
	var date_time = new Date(total) ;
	
	document.getElementById('date_endtime').value= timetrans(date_time.valueOf()+( (document.getElementById('date_end').value)*2592000000 ));
}
function timetrans(date){
    var date = new Date(date);//如果date为13位不需要乘1000
    var Y = date.getFullYear() + '-';
    var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
    var D = (date.getDate() < 10 ? '0' + (date.getDate()) : date.getDate()) + ' ';
    var h = (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':';
    var m = (date.getMinutes() <10 ? '0' + date.getMinutes() : date.getMinutes()) + ':';
    var s = (date.getSeconds() <10 ? '0' + date.getSeconds() : date.getSeconds());
    return Y+M+D;
}
</script>

<input name="date_endtime" type="text" id="date_endtime" value="" size="20" maxlength="255" readonly="readonly" style="border:1px;border-bottom-style:none;border-top-style:none;border-left-style:none;border-right-style:none;">