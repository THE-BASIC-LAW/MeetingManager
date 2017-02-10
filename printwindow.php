<?php
include_once("conn/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript">
		function printview(){
			document.all.WebBrowser.ExecWB(7,1);
			window.close();
		}

		function print(){
			document.all.WebBrowser.ExecWB(6,1);
			window.close();
		}
	</script>
	<object id='WebBrowser' width="0" height="0" classid='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>
</head>
<?php
if(isset($_POST["printview"]) && $_POST["printview"]=="打印预览"){
	?>
	<body onload="printview()">
		<?php
		echo "printview";
	}else if(isset($_POST["print"]) && $_POST["print"]=="打印"){
		?>
		<body onload="print()">
			<?php
			echo "print";
		}
		$id = $_POST["id"];
		$s_str = "select * from tb_meeting_info where meeting_id = $id ";
		$rst = $conn->Execute($s_str);
		?>
		<div>
			<table>
				<tr><td colspan="4" style="text-align: center;"><h2>明日科技有限公司会议记录详情</h2></td></tr>
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
			</table>
		</div>
	</body>
	</html>