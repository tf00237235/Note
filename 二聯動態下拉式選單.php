  <? //動態下拉式選單:Start ?>
                                    <!-- 第一層 -->
                                    <select id="select_zone">
        							<?
										$query_zone="SELECT DISTINCT zone FROM imw_users;";
										$result_zone = db_query($query_zone);
										while($zone_data = db_fetch_object($result_zone)){
											if($zone_data->zone==""){$zone_data->zone="請選擇";}
											echo "<option value=".$zone_data->zone.">".$zone_data->zone."</option>"; 
										}

									?>
                                    </select>
                                    <select name="is_uu" id="is_uu">
                                    <!-- 第二層 -->
									<script>
									  //$(function() {
								     	 $('#select_zone').change(function() {
							            	//更動第一層時第二層清空
							            	$('#is_uu').empty().append("<option value=''>請選擇</option>");
							            	var i = 0;
							            	$.ajax({
							                	type: "post",
							                	url: "./get_username.php",
							                	data: {
							                	    zone: $('#select_zone option:selected').val()
							                	},
							                	datatype: "json",
							                	success: function(result) {
													
													    //當第一層回到預設值時，第二層回到預設位置
						                    		if (result == "" || result == "請選擇") {
                        								$('#is_uu').val($('option:first').val());
						                    		}
                    									//依據第一層回傳的值去改變第二層的內容
						                    		while (i < result.length) {
					    	                	    	$('#is_uu').append("<option value='" +  result[i]['username'] + "'>" + result[i]['username'] + "</option>");
						                    	    	i++;
                    								}
													console.log(result);
                								},
            								});
        								});
    								//});
									</script>
                                    </select>
                                    <? //動態下拉式選單:End ?>
									
另起 php
<?php
	/*ajxj 傳遞參數以便於製作 動態下拉式選單*/
	include("../libraries/applet.php");
	include("$CFG->path_lib_php/members.php");
	header('Content-Type: application/json;charset=utf-8'); //return json string
	$zone = $_POST['zone'];
	$user=array();
	if ($zone != null && $zone != "請選擇") {
    	$query = "SELECT DISTINCT username,email FROM imw_users where zone='".$zone."'";
    	$result = db_query($query);
		while ($row = db_fetch_object($result)) {
        	$user[] = $row;
    	}
	} else {
    	exit;
	}
//	print_r($user);
	echo json_encode($user);
	exit;
?>