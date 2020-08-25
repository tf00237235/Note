function check_all(obj,cName) 
{ 
    var checkboxs = document.getElementsByName(cName); 
    for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;} 
} 
<th><input type="checkbox" onclick="check_all(this,'review_check[]')">送出審核</th>
<input type="checkbox" name="review_check[]" id="review_check" value="">
check_all(this,'review_check[]')