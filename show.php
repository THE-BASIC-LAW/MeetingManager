<?php
include_once("conn/conn.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		th{background: #CDCDCD;padding: 0 10px;}

		.view img{width: 26px; height: 18px; margin-top: 5px}

		.view td{height: 30px}
	</style>
</head>
<body>
	<table style="margin: 10px auto; border-collapse: collapse;" class="view">
		<tr><td colspan="10" style="text-align: center;"><h6>会议信息浏览</h6></td></tr>
		<tr>
			<th><h6>会议编号</h6></th>
			<th><h6>会议名称</h6></th>
			<th><h6>部门名称</h6></th>
			<th><h6>会议地点</h6></th>
			<th><h6>会议日期</h6></th>
			<th><h6>主持人</h6></th>
			<th><h6>出席人员</h6></th>
			<th><h6>记录人</h6></th>
			<th><h6>会议摘要</h6></th>
			<th><h6>查看详情</h6></th>
		</tr>
		<?php
		if($_POST[found_type]=="按会议编号查询"){
			$sqlstr = "select * from tb_meeting_info where meeting_id = $_POST[found_content]";
		}else{
			$sqlstr = "select * from tb_meeting_info where meeting_name = $_POST[found_content]";
		}
		$rst = $conn->Execute($sqlstr);
		if(!$rst->EOF){
			?>
			<tr>
				<td><?php echo $rst->fields[0]?></td>
				<td><?php echo $rst->fields[1]?></td>
				<td><?php echo $rst->fields[2]?></td>
				<td><?php echo $rst->fields[3]?></td>
				<td><?php echo $rst->fields[4]?></td>
				<td><?php echo $rst->fields[5]?></td>
				<td><?php echo $rst->fields[6]?></td>
				<td><?php echo $rst->fields[7]?></td>
				<td><?php echo $rst->fields[8]?></td>
				<?php echo "<td><a href=showinfo.php?id=".$rst->fields[0]." height=\"20\" target=\"_blank\"><img src=\"images/xiazai.gif\"></a></td>"?>
			</tr>
			<?php
		}else{
			echo "<script>alert('无符合查询条件的结果');history.go(-1)</script>";
		}
		?>
	</table>
</body>
</html>