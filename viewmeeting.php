<?php
include_once("conn/conn.php");
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
	<div>
		<table style="margin: 10px auto; border-collapse: collapse;" class="view">
			<tr><td colspan="10"><h6>会议信息浏览</h6></td></tr>
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
			$page = empty($_GET["page"])?1:$_GET["page"];
			$len = 10;
			$sqlcount = "select count(*) from tb_meeting_info";
			$rst_count = $conn->Execute($sqlcount)->fields[0];
			$pagetot = ceil($rst_count/$len);
			$offset = $page <= 1 ? 0 : ($page >= $pagetot ? ($pagetot-1) * $len : ($page-1) * $len);
			$prepage = $page - 1;
			$nextpage = $page + 1; 
			$sqlstr = "select * from tb_meeting_info order by meeting_id limit $offset,$len";
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
					<?php echo "<td><a href=showinfo.php?id=".$rst->fields[0]." height=\"20\" target=\"_blank\"><img src=\"images/xiazai.gif\"></a></td>"?>
				</tr>
				<?php
				$rst->movenext();
			}
			?>
		</table>
		<?php
		if($page <= 0){
			echo "<h2>当前是第&nbsp".$page."&nbsp页&nbsp<a href=manager.php?lmbs=浏览会议记录&page=".$nextpage.">下一页</a>&nbsp|&nbsp共&nbsp".$pagetot."&nbsp页</h2>&nbsp";
		}else if($page >= $pagetot){
			echo "<h2>当前是第&nbsp".$page."&nbsp页&nbsp<a href=manager.php?lmbs=浏览会议记录&page=".$prepage.">上一页</a>&nbsp|&nbsp共&nbsp".$pagetot."&nbsp页</h2>&nbsp";
		}else{
			echo "<h2>当前是第&nbsp".$page."&nbsp页&nbsp<a href=manager.php?lmbs=浏览会议记录&page=".$prepage.">上一页</a>&nbsp|&nbsp<a href=manager.php?lmbs=浏览会议记录&page=".$nextpage.">下一页</a>&nbsp|&nbsp共&nbsp".$pagetot."&nbsp页</h2>&nbsp";
		}
		?>
		<div>点此导出报表>>>>&nbsp<a href="createform.php" target="_blank"><button style="background: url(images/out_15.jpg); width: 52px; height: 24px; vertical-align: -25%"></button></a></div>
	</div>
</body>
</html>