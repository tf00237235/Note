<?
function valid_pass($candidate) {  
    $r1='/[A-Z]/';  //uppercase  
    $r2='/[a-z]/';  //lowercase  
    $r3='/[0-9]/';  //numbers  
    $r4='/[~!@#$%^&*()\-_=+{};:<,.>?]/';  // special char  
  
    if(preg_match_all($r1,$candidate, $o)<1) {  
        echo "�K�X���ݥ]�t�ܤ֤@�Ӥj�g�r���A�Ъ�^�ק�I<br />";  
        return FALSE;  
    }  
    if(preg_match_all($r2,$candidate, $o)<1) {  
        echo "�K�X���ݥ]�t�ܤ֤@�Ӥp�g�r���A�Ъ�^�ק�I<br />";  
        return FALSE;  
    }  
    if(preg_match_all($r3,$candidate, $o)<1) {  
        echo "�K�X���ݥ]�t�ܤ֤@�ӼƦr�A�Ъ�^�ק�I<br />";  
        return FALSE;  
    }  
    if(preg_match_all($r4,$candidate, $o)<1) {  
        echo "�K�X���ݥ]�t�ܤ֤@�ӯS��Ÿ��G[~!@#$%^&*()\-_=+{};:<,.>?]�A�Ъ�^�ק�I<br />";  
        return FALSE;  
    }  
    if(strlen($candidate)<8) {  
        echo "�K�X���ݥ]�t�ܤ֧t��8�Ӧr�šA�Ъ�^�ק�I<br />";  
        return FALSE;  
    }  
    return TRUE;  
}      
?>