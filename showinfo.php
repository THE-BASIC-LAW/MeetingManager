<?php
header("Content-Cype: text/html; charset = utf-8");
include_once("conn/conn.php");
$meeting_id = $_GET["id"];
$sqlstr = "select * from tb_meeting_info where meeting_id = '$meeting_id'";
$rst = $conn->Execute($sqlstr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		*{text-align: center; font-size: 12px; line-height: 30px}

		h2{font-size: 15px}

		table{margin: 10px auto;}

		td{width: 150px;}

		.abs{text-align: left;}

		.content{text-indent: 28px; padding-left: 20px; text-align: left;}

		input{width: 100px; margin: 0 20px}
	</style>
</head>
<body>
	<div>
	<form action="printwindow.php" method="post">
		<table>
			<tr><td colspan="4"><h2>明日科技有限公司会议记录详情</h2></td></tr>
			<tr>
				<td>会议编号:</td>
				<td><?php echo $rst->fields[0]?></td>
				<td>会议名称:</td>
				<td><?php echo $rst->fields[1]?></td>
			</tr>
			<tr>
				<td>部门名称:</td>
				<td><?php echo $rst->fields[2]?></td>
				<td>会议地点:</td>
				<td><?php echo $rst->fields[3]?></td>
			</tr>
			<tr>
				<td>会议日期:</td>
				<td><?php echo $rst->fields[4]?></td>
				<td>会议主持人:</td>
				<td><?php echo $rst->fields[5]?></td>
			</tr>
			<tr>
				<td>出席人员:</td>
				<td><?php echo $rst->fields[6]?></td>
				<td>会议记录人:</td>
				<td><?php echo $rst->fields[7]?></td>
			</tr>
			<tr>
				<td>会议摘要:</td>
				<td class="abs" colspan="3"><?php echo $rst->fields[8]?></td>
			</tr>
			<tr>
				<td>会议内容:</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="4">
				<div class="content">
					<?php
					$address = $rst->fields[9];
					$defile = fopen("$address", "r");
					while(!feof($defile)){
						$deline = fgets($defile);
						echo $deline;
					}
					fclose($defile);
					?>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4"><input type="hidden" name="id" value="<?php echo $meeting_id; ?>"></td>
			</tr>
		</table>
	</div>
	<div>
		<input type="submit" name="printview" value="打印预览">
		<input type="submit" name="print" value="打印">
	</div>
	</form>
</body>
</html>