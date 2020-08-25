<?
function valid_pass($candidate) {  
    $r1='/[A-Z]/';  //uppercase  
    $r2='/[a-z]/';  //lowercase  
    $r3='/[0-9]/';  //numbers  
    $r4='/[~!@#$%^&*()\-_=+{};:<,.>?]/';  // special char  
  
    if(preg_match_all($r1,$candidate, $o)<1) {  
        echo "密碼必需包含至少一個大寫字母，請返回修改！<br />";  
        return FALSE;  
    }  
    if(preg_match_all($r2,$candidate, $o)<1) {  
        echo "密碼必需包含至少一個小寫字母，請返回修改！<br />";  
        return FALSE;  
    }  
    if(preg_match_all($r3,$candidate, $o)<1) {  
        echo "密碼必需包含至少一個數字，請返回修改！<br />";  
        return FALSE;  
    }  
    if(preg_match_all($r4,$candidate, $o)<1) {  
        echo "密碼必需包含至少一個特殊符號：[~!@#$%^&*()\-_=+{};:<,.>?]，請返回修改！<br />";  
        return FALSE;  
    }  
    if(strlen($candidate)<8) {  
        echo "密碼必需包含至少含有8個字符，請返回修改！<br />";  
        return FALSE;  
    }  
    return TRUE;  
}      
?>