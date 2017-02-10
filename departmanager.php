<?php
session_start();
include_once("conn/conn.php");
if($_SESSION[rights]!=1){
	echo "<script>alert('非法操作!');history.go(-1)</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		#del_btn{background: url(images/delete_15.jpg) no-repeat; width: 52px; height: 24px}

		.record_mng th{width: 50px}

		.record_mng td{width: 100px; padding: 5px 0}

	</style>

	<script type="text/javascript">
		function confirm_del(idName){
			if(confirm("确定要删除吗?")){
				location="depart_del.php?id="+idName;
			}else{}
		}
	</script>
</head>
<body>
	<div>
		<table class="record_mng">
			<tr>
				<th>部门编号</th>
				<th>部门名称</th>
				<th>操作</th>
			</tr>
			<?php
			$page = empty($_GET["page"])?1:$_GET["page"];
			$len = 10;
			$sqlcount = "select count(*) from tb_meeting_depart";
			$rst_count = $conn->Execute($sqlcount)->fields[0];
			$pagetot = ceil($rst_count/$len);
			$offset = $page <= 1 ? 0 : ($page >= $pagetot ? ($pagetot-1) * $len : ($page-1) * $len);
			$prepage = $page - 1;
			$nextpage = $page + 1; 
			$sqlstr = "select * from tb_meeting_depart order by department_id limit $offset,$len";
			$rst = $conn->Execute($sqlstr);
			while(!$rst->EOF){
				?>
				<tr>
					<td id="<?php echo $rst->fields[0]?>"><?php echo $rst->fields[0]?></td>
					<td><?php echo $rst->fields[1]?></td>
					<td><button name="delete" id="del_btn" value=<?php echo $rst->fields[0]?> onclick="confirm_del(this.value)"></button></td>
				</tr>
				<?php
				$rst->movenext();
			}
			?>
		</table>
	</div>
	<div>点此添加部门>>>>&nbsp<a href="#" onclick="javascript:Wopen=open('add_depart.php','','width=550,height=420,scrollbars=no')"><button style="background: url(images/append_15.jpg); width: 52px; height: 24px; vertical-align: -25%"></button></a></div>
</div>
</body>
</html>