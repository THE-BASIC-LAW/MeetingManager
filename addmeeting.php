<?php
include_once("conn/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		.td3{text-align: left;}

		#add_mbtn1{width: 52px; height: 24px; background-image: url(images/append_15.jpg);}

		#add_mbtn2{width: 52px; height: 24px; background-image: url(images/cancel.jpg);}
	</style>
	<script type="text/javascript">
		function trim(s){  
			return trimRight(trimLeft(s));  
		}  

		function trimLeft(s){  
			if(s == null) {  
				return "";  
			}  
			var whitespace = new String(" \t\n\r");  
			var str = new String(s);  
			if (whitespace.indexOf(str.charAt(0)) != -1) {  
				var j=0, i = str.length;  
				while (j < i && whitespace.indexOf(str.charAt(j)) != -1){  
					j++;  
				}  
				str = str.substring(j, i);  
			}  
			return str;  
		}  


		function trimRight(s){  
			if(s == null) return "";  
			var whitespace = new String(" \t\n\r");  
			var str = new String(s);  
			if (whitespace.indexOf(str.charAt(str.length-1)) != -1){  
				var i = str.length - 1;  
				while (i >= 0 && whitespace.indexOf(str.charAt(i)) != -1){  
					i--;  
				}  
				str = str.substring(0, i+1);  
			}  
			return str;  
		}    
		function check_submit(){
			if (trim(theForm.meeting_name.value)==""){
				alert("会议名称不能为空");
				theForm.meeting_name.focus();
				return false;
			}else if(trim(theForm.department.value)=="请选择部门"){
				alert("请选择部门");
				theForm.department.focus();
				return false;
			}else if(trim(theForm.meeting_place.value)==""){
				alert("会议地点不能为空");
				theForm.meeting_place.focus();
				return false;
			}else if(trim(theForm.meeting_host.value)==""){
				alert("会议主持人不能为空");
				theForm.meeting_host.focus();
				return false;
			}else if(trim(theForm.meeting_saver.value)==""){
				alert("会议记录人不能为空");
				theForm.meeting_recorder.focus();
				return false;
			}else if(trim(theForm.meeting_present.value)==""){
				alert("出席人员不能为空");
				theForm.meeting_attender.focus();
				return false;
			}else if(trim(theForm.textarea.value)==""){
				alert("会议摘要不能为空");
				theForm.textarea.focus();
				return false;
			}else{
				theForm.submit();
			}
		}
	</script>
</head>
<body>
	
	<div>
		<table style="margin: 10px auto">
			<form name="theForm" method="post" action="addmeeting_chk.php" enctype="multipart/form-data" onsubmit="return check_submit();">
				<tr><td colspan="3" height="32"><h6>添加会议记录</h6></td></tr>
				<tr>
					<td width="120" height="28">会议名称:</td>
					<td class="td3"><input type="text" name="meeting_name"></td>
					<td class="td3" width="180">*填写会议记录名称</td>
				</tr>
				<tr>
					<td height="28">部门名称:</td>
					<td class="td3">
						<select name="department">
							<option>请选择部门</option>
							<?php
							$sqlstr = "select department_name from tb_meeting_depart";
							$rst = $conn->Execute($sqlstr);
							while (!$rst->EOF){
								?>
								<option><?php echo $rst->fields[0]; ?></option>
								<?php
								$rst->movenext(); 
							}
							?>				
						</select>
					</td>
					<td class="td3">*选择举行会议部门</td>
				</tr>
				<tr>
					<td height="28">会议地点:</td>
					<td class="td3"><input type="text" name="meeting_place"></td>
					<td class="td3">*填写会议地点名称</td>
				</tr>
				<tr>
					<td height="28">会议日期:</td>
					<td class="td3">
						<select name="mb_y">
							<?php
							for($i = 2015; $i < 2026; $i++){
								?>
								<option><?php echo $i ?></option>
								<?php
							}
							?>				
						</select>年
						<select name="mb_m">
							<?php
							for($i = 1; $i < 13; $i++){
								?>
								<option><?php echo $i ?></option>
								<?php
							}
							?>				
						</select>月
						<select name="mb_d">
							<?php
							for($i = 1; $i < 32; $i++){
								?>
								<option><?php echo $i ?></option>
								<?php
							}
							?>				
						</select>日
					</td>
					<td class="td3">*选择会议召开日期</td>
				</tr>
				<tr>
					<td height="28">会议主持人:</td>
					<td class="td3"><input type="text" name="meeting_host"></td>
					<td class="td3">*填写会议主持人</td>
				</tr>
				<tr>
					<td height="28">会议记录人:</td>
					<td class="td3"><input type="text" name="meeting_saver"></td>
					<td class="td3">*填写会议记录人</td>
				</tr>
				<tr>
					<td height="28">出席人员:</td>
					<td class="td3"><input type="text" name="meeting_present"></td>
					<td class="td3">*填写会议出席人员</td>
				</tr>
				<tr>
					<td height="28">上传会议内容:</td>
					<td class="td3">
						<input type="file" name="meeting_documents" size="16">
					</td>
					<td class="td3">*上传txt格式会议文稿</td>
				</tr>
				<tr>
					<td height="28">会议摘要:</td>
					<td class="td3"><textarea style="height: 70px; width: 170px; text-align: left;" name="textarea"></textarea></td>
					<td class="td3">*填写会议记录摘要</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" id="add_mbtn1" value="">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset" id="add_mbtn2" value="">
					</td>
					<td></td>
				</tr>
			</form>
		</table>
	</div>
</body>
</html>