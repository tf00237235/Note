<?php
//���������� - 5.6�H�U
function is_tw_id($id) //���� �����Ҧr�� �榡
{
    //�إߦr�����ư}�C
    $head = array('A'=>10,'B'=>11,'C'=>12,'D'=>13,'E'=>14,'F'=>15,
                  'G'=>16,'H'=>17,'I'=>34,'J'=>18,'K'=>19,'L'=>20,
                  'M'=>21,'N'=>22,'O'=>35,'P'=>23,'Q'=>24,'R'=>25,
                  'S'=>26,'T'=>27,'U'=>28,'V'=>29,'W'=>32,'X'=>30,
                  'Y'=>31,'Z'=>33);
    //�ˬd�����r�榡�O�_���T
     if (ereg("^[A-Za-z][1-2][0-9]{8}$",$id)){
        //���}�r��
        for($i=0; $i<10; $i++){
            $idArray[$i] = substr($id,$i,1);  
        }
        $idArray[0] = strtoupper($idArray[0]); //�p�g��j�g
        //���o�r������&�إߥ[�v����
        $a[0] = substr($head[$idArray[0]],0,1);
        $a[1] = substr($head[$idArray[0]],1,1);
        $total = $a[0]*1+$a[1]*9;
        //���o�Ʀr����&�إߥ[�v����
        for($j=1; $j<=8; $j++){
           $total += $idArray[$j]*(9-$j);
        }         
        //�ˬd���X
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
//���������� - 7.0
function is_tw_id($id){
	// �h�ť�&��j�g
    $id = strtoupper(trim($id));
    // �^��r���P�ƭȹ�Ӫ�
    $alphabetTable = [
        'A' => 10, 'B' => 11, 'C' => 12, 'D' => 13, 'E' => 14, 'F' => 15, 'G' => 16,
        'H' => 17, 'I' => 34, 'J' => 18, 'K' => 19, 'L' => 20, 'M' => 21, 'N' => 22,
        'O' => 35, 'P' => 23, 'Q' => 24, 'R' => 25, 'S' => 26, 'T' => 27, 'U' => 28,
        'V' => 29, 'X' => 30, 'Y' => 31, 'Z' => 33, 'W' => 32
    ];

    // �ˬd�����Ҧr���榡
    // ps. �ĤG�X���ҥ~����ABCD�A�b�o�̥���@�A�ȴ��ѻݭn���H�ѦҡA��@�覡�OA����10�A�u���Ӧ��0�h�[�v�Y�i
    // �O�W�a�ϵL���y����B�j���a�ϤH���B��D�~���G
    // �k�ʨϥ�A�B�k�ʨϥ�B
    // �~��H�G
    // �k�ʨϥ�C�B�k�ʨϥ�D
    if (!preg_match("/^[A-Z]{1}[12ABCD]{1}[0-9]{8}$/", $id)){
        // ^ �O�}�l�Ÿ�
        // $ �O�����Ÿ�
        // [] ���A�����O���h����
        // {} �O�n���ư���X��
        return false; 
    }

    // ���}�r��
    $idArray = str_split($id);
	//�x
	if(preg_match("/^[A-Z]{1}[1-2]{1}[0-9]{8}$/", $id)){
		// �^��r���[�v�ƭ�
		$alphabet = $alphabetTable[$idArray[0]];
		$point = substr($alphabet, 0, 1) * 1 + substr($alphabet, 1, 1) * 9;
	
		// �Ʀr�����[�v�ƭ�
		for ($i = 1; $i <= 8; $i++) {
			$point += $idArray[$i] * (9 - $i);
		}
		$point = $point + $idArray[9];
	
		return $point % 10 == 0 ? true : false;
	}
	
	
	if(preg_match("/^[A-Z]{1}[12ABCD]{1}[0-9]{8}$/", $id)){
		
		//�Ĥ@�^��[�v
		$alphabet = $alphabetTable[$idArray[0]];
		$point = substr($alphabet, 0, 1) * 1 + substr($alphabet, 1, 1) * 9;
		//�ĤG�^��[�v
		$alphabet = $alphabetTable[$idArray[1]];
		$point_s = (substr($alphabet, 1, 1) * 8)%10;
		
		
		// �Ʀr�����[�v�ƭ�
		for ($i = 2; $i <= 8; $i++) {
			$point += $idArray[$i] * (9 - $i);
		}
		$point = $point + $point_s + $idArray[9];
	
		return $point % 10 == 0 ? true : false;
		
	}
}