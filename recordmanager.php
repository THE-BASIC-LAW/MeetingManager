<?php
session_start();
include_once("conn/conn.php");
if($_SESSION[rights]!=1){
	echo "<script>alert('非法操作!');history.go(-1)</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		#upd_btn{background: url(images/modify.jpg) no-repeat; width: 52px; height: 24px}

		#del_btn{background: url(images/delete_15.jpg) no-repeat; width: 52px; height: 24px}

		.record_mng th{width: 50px}

		.record_mng td{width: 100px; padding: 5px 0}

		.record_mng img{width: 16px; height: 16px; vertical-align: -15%}
	</style>

	<script type="text/javascript">
 		function confirm_del(idName){
 			if(confirm("确定要删除吗?")){
 				location="meeting_del.php?id="+idName;
 			}else{}
 		}
	</script>
</head>
<body>
	<div>
		<table class="record_mng">
			<tr>
				<th width="40">会议编号</th>
				<th>会议名称</th>
				<th>部门名称</th>
				<th>会议地点</th>
				<th>会议日期</th>
				<th>主持人</th>
				<th>出席人员</th>
				<th>记录人</th>
				<th>会议摘要</th>
				<th>修改记录</th>
				<th>删除记录</th>
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
					<td><a href="record_modify.php?id=<?php echo $rst->fields[0] ?>"><img src="images/amend.ico"></td>
					<td><button name="delete" id="del_btn" value=<?php echo $rst->fields[0]?> onclick="confirm_del(this.value)"></button></td>
				</tr>
				<?php
				$rst->movenext();
			}
			?>
		</table>
		<?php
		if($page <= 0){
			echo "<h2>当前是第&nbsp".$page."&nbsp页&nbsp<a href=manager.php?lmbs=会议信息管理&page=".$nextpage.">下一页</a>&nbsp|&nbsp共&nbsp".$pagetot."&nbsp页</h2>&nbsp";
		}else if($page >= $pagetot){
			echo "<h2>当前是第&nbsp".$page."&nbsp页&nbsp<a href=manager.php?lmbs=会议信息管理&page=".$prepage.">上一页</a>&nbsp|&nbsp共&nbsp".$pagetot."&nbsp页</h2>&nbsp";
		}else{
			echo "<h2>当前是第&nbsp".$page."&nbsp页&nbsp<a href=manager.php?lmbs=会议信息管理&page=".$prepage.">上一页</a>&nbsp|&nbsp<a href=manager.php?lmbs=会议信息管理&page=".$nextpage.">下一页</a>&nbsp|&nbsp共&nbsp".$pagetot."&nbsp页</h2>&nbsp";
		}
		?>
	</div>
</div>
</body>
</html>