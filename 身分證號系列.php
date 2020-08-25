<?php
//身分證驗證 - 5.6以下
function is_tw_id($id) //驗證 身分證字號 格式
{
    //建立字母分數陣列
    $head = array('A'=>10,'B'=>11,'C'=>12,'D'=>13,'E'=>14,'F'=>15,
                  'G'=>16,'H'=>17,'I'=>34,'J'=>18,'K'=>19,'L'=>20,
                  'M'=>21,'N'=>22,'O'=>35,'P'=>23,'Q'=>24,'R'=>25,
                  'S'=>26,'T'=>27,'U'=>28,'V'=>29,'W'=>32,'X'=>30,
                  'Y'=>31,'Z'=>33);
    //檢查身份字格式是否正確
     if (ereg("^[A-Za-z][1-2][0-9]{8}$",$id)){
        //切開字串
        for($i=0; $i<10; $i++){
            $idArray[$i] = substr($id,$i,1);  
        }
        $idArray[0] = strtoupper($idArray[0]); //小寫轉大寫
        //取得字母分數&建立加權分數
        $a[0] = substr($head[$idArray[0]],0,1);
        $a[1] = substr($head[$idArray[0]],1,1);
        $total = $a[0]*1+$a[1]*9;
        //取得數字分數&建立加權分數
        for($j=1; $j<=8; $j++){
           $total += $idArray[$j]*(9-$j);
        }         
        //檢查比對碼
        if($total%10 == 0) {
			$checksum = 0;
        } else {
			$checksum = 10-$total%10;
        }
        if ($idArray[9] == $checksum) {
			return true;  
        } else {  
			return false;
        }
    return false;
    }  
}
function sex_check($sex){
	
	if(substr($sex, 1, 1)==1){
		return 1;
	}else{
		return 0;
	}
	
}
//身分證驗證 - 7.0
function is_tw_id($id){
	// 去空白&轉大寫
    $id = strtoupper(trim($id));
    // 英文字母與數值對照表
    $alphabetTable = [
        'A' => 10, 'B' => 11, 'C' => 12, 'D' => 13, 'E' => 14, 'F' => 15, 'G' => 16,
        'H' => 17, 'I' => 34, 'J' => 18, 'K' => 19, 'L' => 20, 'M' => 21, 'N' => 22,
        'O' => 35, 'P' => 23, 'Q' => 24, 'R' => 25, 'S' => 26, 'T' => 27, 'U' => 28,
        'V' => 29, 'X' => 30, 'Y' => 31, 'Z' => 33, 'W' => 32
    ];

    // 檢查身份證字號格式
    // ps. 第二碼的例外條件ABCD，在這裡未實作，僅提供需要的人參考，實作方式是A對應10，只取個位數0去加權即可
    // 臺灣地區無戶籍國民、大陸地區人民、港澳居民：
    // 男性使用A、女性使用B
    // 外國人：
    // 男性使用C、女性使用D
    if (!preg_match("/^[A-Z]{1}[12ABCD]{1}[0-9]{8}$/", $id)){
        // ^ 是開始符號
        // $ 是結束符號
        // [] 中括號內是正則條件
        // {} 是要重複執行幾次
        return false; 
    }

    // 切開字串
    $idArray = str_split($id);
	//台
	if(preg_match("/^[A-Z]{1}[1-2]{1}[0-9]{8}$/", $id)){
		// 英文字母加權數值
		$alphabet = $alphabetTable[$idArray[0]];
		$point = substr($alphabet, 0, 1) * 1 + substr($alphabet, 1, 1) * 9;
	
		// 數字部分加權數值
		for ($i = 1; $i <= 8; $i++) {
			$point += $idArray[$i] * (9 - $i);
		}
		$point = $point + $idArray[9];
	
		return $point % 10 == 0 ? true : false;
	}
	
	
	if(preg_match("/^[A-Z]{1}[12ABCD]{1}[0-9]{8}$/", $id)){
		
		//第一英文加權
		$alphabet = $alphabetTable[$idArray[0]];
		$point = substr($alphabet, 0, 1) * 1 + substr($alphabet, 1, 1) * 9;
		//第二英文加權
		$alphabet = $alphabetTable[$idArray[1]];
		$point_s = (substr($alphabet, 1, 1) * 8)%10;
		
		
		// 數字部分加權數值
		for ($i = 2; $i <= 8; $i++) {
			$point += $idArray[$i] * (9 - $i);
		}
		$point = $point + $point_s + $idArray[9];
	
		return $point % 10 == 0 ? true : false;
		
	}
}