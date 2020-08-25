<?
//csv version
function import_insert_sp($frm){
	global	$CFG, $web_users, $document_title, $time_arr,$is_users,$title;
	
	if($_FILES['file']['error'] > 0){
		$message = 'Fail';
		return $message;
	}else if($_FILES['file']['tmp_name']){
		
		$message = '';

		//讀取檔案
	
		$file_data = $_FILES['file']['tmp_name'];
		$file = fopen($file_data,"r");
		
		while(!feof($file)){
			$data[] = fgetcsv($file);
		}
	}
	print_r($message);
	die;
}

?>
