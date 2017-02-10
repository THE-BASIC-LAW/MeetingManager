<?php
// header("Content-type:application/vnd.ms=excel");
// header("Content-Disposition:filename=会议报表.xls");
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
		<table border="1" style="border-collapse:collapse" >
			<tr><td colspan="9" style="text-align: center;"><h6>会议信息浏览</h6></td></tr>
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
			</tr>
			<?php
			$sqlstr = "select * from tb_meeting_info";
			$rst = $conn->Execute($sqlstr);
			while(!$rst->EOF){
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
				</tr>
				<?php
				$rst->movenext();
			}
			?>
		</table>
	</div>
</body>
</html>