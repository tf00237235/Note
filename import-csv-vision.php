<?
//csv version
function import_insert_sp($frm){
	global	$CFG, $web_users, $document_title, $time_arr,$is_users,$title;
	
	if($_FILES['file']['error'] > 0){
		import($frm);
		msg('很抱歉, 檔案上傳失敗！');
		exit;
	}else if($_FILES['file']['tmp_name']){
		
		$message = '';

		//讀取檔案
	
		$file_data = $_FILES['file']['tmp_name'];
		$file = fopen($file_data,"r");
		
		while(!feof($file)){
			$data[] = fgetcsv($file);
		}
		//data 一維走Y軸 二維X軸
		for($i=0;$i<=count($data);$i++){
			$bs_id = '';
			$detail_select = "SELECT qd.* FROM `$CFG->table_name_question_detail` as qd 
							LEFT JOIN `$CFG->table_name_question_second` as qs ON qs.id=qd.question_id 
							LEFT JOIN `$CFG->table_name_question` as qb ON qb.id=qs.question_id 
							WHERE qs.`question_id`='".$frm['import_mode']."' AND qd.`status`='1' AND qb.`year`='".$frm['year']."' ORDER BY qd.`question_id`,qd.`id` ASC ";
			$detail_select_db = db_query($detail_select);
			while ($detail_select_rs = db_fetch_object($detail_select_db)){
				$detail_id[] = $detail_select_rs->id;
			}
			$screening_num_b_id = get_field($CFG->table_name_Screen,'base_id','`Screening_num`="'.$data[$i][0].'"');
			$idnumber = get_field($CFG->table_name_base,'idnumber','`id`="'.$screening_num_b_id.'"');
			
			$select_bs_id = db_query("SELECT b.`id`, bs.`Screening_hosptial_code` FROM `$CFG->table_name_base` as b LEFT JOIN `$CFG->table_name_Screen` as bs ON b.id = bs.base_id WHERE b.`idnumber` = '".$idnumber."' AND bs.`Screening_year` = '".$frm['year']."'");
			$rs_bs_id = db_fetch_object($select_bs_id);
			$bs_id = $rs_bs_id->id;
			$lock_id = $rs_bs_id->Screening_hosptial_code;
			if($bs_id==''){
					$message .= $idnumber.'掛號檔不存在<br>';
			}else{
				//防當年度重復寫入
				$ans_select = "SELECT * FROM `$CFG->table_name_question_report` WHERE `question_base_id`='".$frm['import_mode']."' AND `base_id`='$bs_id' ";
				$ans_select_db = db_query($ans_select);
				$ans_select_num = db_num_rows($ans_select_db);
				
				if($ans_select_num){
					$message .= $idnumber.'今年此問卷曾被匯入/新增過！</br>';
				}else{
					for($k=1;$k<count($data[$i]);$k++){
						$ans = $data[$i][$k]; 		
						$ans_insert = 'INSERT INTO `'.$CFG->table_name_question_ans.'`(`question_id`, `base_id`, `ans`, `lock_id`, `add_time`) 
										VALUES ("'.$detail_id[($k-1)].'","'.$bs_id.'","'.$ans.'","'.$lock_id.'","'.$CFG->now.'")';
							
						db_query($ans_insert);
						
					}
					//report 狀態碼更新
					$select_report = "SELECT * FROM `$CFG->table_name_question_report` WHERE `base_id`='$bs_id' AND `question_base_id`='".$frm['import_mode']."'";
					$db_select_report = db_query($select_report);
					$num_report =  db_num_rows($db_select_report);
					if($num_report){
						$update_report = "UPDATE `$CFG->table_name_question_report` SET `status`='6', `edit_time`='$CFG->now' WHERE `base_id`='$bs_id' AND `question_base_id`='".$frm['import_mode']."'";
						db_query($update_report);
					}else{
						$insert_report = "INSERT INTO `$CFG->table_name_question_report`(`base_id`, `question_base_id`, `lock_id`, `add_time`, `status`) VALUES ('".$bs_id."','".$frm['import_mode']."','".$lock_id."','$CFG->now','6')";
						db_query($insert_report);
					}
				}
			}
		}
	}
	print_r($message);
	
	die;
}

?>