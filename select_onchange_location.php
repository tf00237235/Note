/*
說明：用於 select 被重新選擇的時候可以自動跳轉頁面


*/
<?
	if($frm['year']){
		//取出全問卷
		$sql_select = "SELECT * FROM `$CFG->table_name_question` WHERE `status`='1' AND `year`='".$frm['year']."'";
		$db_select = db_query($sql_select);
	}else{
		$frm['year'] = date("Y",strtotime($CFG->now));
		//取出全問卷
		$sql_select = "SELECT * FROM `$CFG->table_name_question` WHERE `status`='1' AND `year`='".$frm['year']."'";
		$db_select = db_query($sql_select);
	}

?>

請選年份</br>
	<select name='year' onchange="location='http://hms.web.vcom.tw/elderly/index.php?mode=import&year='+this.options[this.selectedIndex].value">
		<option value="2015" <? if($frm['year']==2015){echo "selected";} ?>>2015</option>
		<option value="2016" <? if($frm['year']==2016){echo "selected";} ?>>2016</option>
		<option value="2017" <? if($frm['year']==2017){echo "selected";} ?>>2017</option>
		<option value="2018" <? if($frm['year']==2018){echo "selected";} ?>>2018</option>
		<option value="2019" <? if($frm['year']==2019){echo "selected";} ?>>2019</option>
		<option value="2020" <? if($frm['year']==2020){echo "selected";} ?>>2020</option>
		<option value="2021" <? if($frm['year']==2021){echo "selected";} ?>>2021</option>
	</select>