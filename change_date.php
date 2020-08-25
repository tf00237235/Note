<?
function date_change($default_date,$type){
	
	$date = explode("-",$default_date);
	if(count($date)<3 ){
		$date = explode("/",$default_date);
	}
	
	switch($type){
		//日月年"/"
		case 1:
			$date = $date[2]."/".$date[1]."/".$date[0];
			break;
		//年月日"/"
		case 2:
			$date = $date[0]."/".$date[1]."/".$date[2];
			break;
		//日月年"-"
		case 3:
			$date = $date[2]."-".$date[1]."-".$date[0];
			break;
		//年月日"-"
		case 4:
			$date = $date[0]."-".$date[1]."-".$date[2];
			break;
		//台灣特別版
		case 5:
			$date = ($date[0]-1911)."-".$date[1]."-".$date[2];
			break;
		
	}
	
	return $date;

}

?>